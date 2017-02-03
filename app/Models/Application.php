<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function menu()
    {
        return $this->hasOne('App\Models\Menu', 'menu_id', 'id');
    }
}
