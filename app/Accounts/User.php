<?php

namespace App\Accounts;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * Mass assignment guards.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'api_token', 'remember_token',
    ];

    /**
     * Relation to folders.
     */
    public function folders()
    {
        return $this->hasMany('App\Mrkd\Folder');
    }

    /**
     * Helper method to get top folder.
     */
    public function topFolder()
    {
        return $this->folders()->where('top_folder', true)->first();
    }

    /**
     * Relation to bookmarks.
     */
    public function bookmarks()
    {
        return $this->hasMany('App\Mrkd\Bookmark');
    }
}
