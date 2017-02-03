<?php namespace App\Http\Middleware;

use App\Models\Menu as Navbar;
use Menu;
use Closure;

class GenerateMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('navbarmenu', function ($menu) {

            Navbar::with('application')->get()->each(function ($item, $key) use ($menu) {

                if ($item->parent_id === 0) {
                    $menu->add($item->name,
                        !is_null($item->application) ? $item->application->basepath : '')
                        ->data('order', $item->sequence)
                        ->id($item->id);
                } else {
                    $menu->find($item->parent_id)
                        ->add($item->name,
                            !is_null($item->application) ? $item->application->basepath : '')
                        ->data('order', $item->sequence)
                        ->id($item->id);
                }
            });

        })->sortBy('order');

        return $next($request);
    }
}
