<?php

namespace App\Mrkd;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use NodeTrait, SoftDeletes;

    /**
     * Mass assignment guards.
     *
     * @var array
     */
    protected $guarded = [];

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
        return $this->hasMany('App\Mrkd\Bookmark');
    }
}
