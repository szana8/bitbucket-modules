<?php
namespace LaravelIssueTracker\User\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package LaravelIssueTracker\User\Models
 */
class Profile extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type',
        'name'
    ];

    /**
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

}