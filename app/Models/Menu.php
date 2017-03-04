<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'id', 'menu_id');
    }

}
