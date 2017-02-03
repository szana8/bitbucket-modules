<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'id', 'menu_id');
    }
}
