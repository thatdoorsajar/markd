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
        'url_given',
        'url_resolved',
        'title',
        'description',
        'image_url',
        'content',
        'notes',
        'domain_id',
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
