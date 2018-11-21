<?php

namespace App\Accounts;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'initials',
        'email',
        'api_token',
        'email_verified_at',
        'password',
        'folder_id',
    ];

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
