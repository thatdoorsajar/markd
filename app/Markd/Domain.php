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
        'response_code',
        'title',
        'description',
        'image_url',
    ];
}
