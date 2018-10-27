<?php

namespace App\Markd;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url_resolved',
        'mime_type',
        'encoding',
        'response_code',
        'meta_title',
        'meta_description',
        'meta_image_url',
        'lang',
    ];
}
