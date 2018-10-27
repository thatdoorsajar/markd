<?php

namespace App\Markd;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'meta_title',
        'meta_description',
        'meta_image',
        'title',
        'description',
        'content',
        'notes',
        'is_dead',
        'is_https',
        'folder_id',
        'user_id',
    ];

    /**
     * Relation to bookmarks.
     */
    public function folder()
    {
        return $this->belongsTo('App\Markd\Folder');
    }
}
