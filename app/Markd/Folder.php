<?php

namespace App\Markd;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use NodeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'title',
        'description',
        'notes',
        'is_archived',
        'top_folder',
        'user_id',
    ];

    /**
     * Load these relationships by default.
     *
     * @var array
     */
    protected $with = [
        'bookmarks'
    ];

    /**
     * Specifies the entity for Model route binding.
     * 
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relation to bookmarks.
     */
    public function bookmarks()
    {
        return $this->hasMany('App\Markd\Bookmark');
    }
}
