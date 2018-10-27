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
        'mime_type',
        'encoding',
        'response_code',
        'meta_title',
        'meta_description',
        'meta_image_url',
        'lang',
        'title',
        'description',
        'content',
        'notes',
        'is_article',
        'has_image',
        'has_video',
        'is_dead',
        'is_https',
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
