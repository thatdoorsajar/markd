<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Mrkd\Folder::creating(function ($folder) {
            $folder->slug = str_slug($folder->title).str_random(6);
        });

        \App\Mrkd\Folder::updating(function ($folder) {
            $folder->slug = str_slug($folder->title).str_random(6);
        });
        
        // \App\Mrkd\Folder::observe(\App\Observers\FolderObserver::class);

        \App\Accounts\User::creating(function ($user) {
            $user->initials = strtoupper($user->first_name[0].$user->last_name[0]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
