<?php

namespace App\Mrkd;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookmark extends Model
{
    use SoftDeletes;

    /**
     * Mass assignment guards.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Relation to bookmarks.
     */
    public function folder()
    {
        return $this->belongsTo('App\Mrkd\Folder');
    }
}
