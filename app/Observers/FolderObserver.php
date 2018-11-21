<?php

namespace App\Observers;

use App\Mrkd\Folder;

class FolderObserver
{
    /**
     * Handle the folder "created" event.
     *
     * @param  \App\Mrkd\Folder  $folder
     * @return void
     */
    public function created(Folder $folder)
    {
        $folder->slug = str_slug($folder->title).str_random(6);
    }

    /**
     * Handle the folder "updated" event.
     *
     * @param  \App\Mrkd\Folder  $folder
     * @return void
     */
    public function updated(Folder $folder)
    {
        $folder->slug = str_slug($folder->title).str_random(6);
    }

    /**
     * Handle the folder "updating" event.
     *
     * @param  \App\Mrkd\Folder  $folder
     * @return void
     */
    public function updating(Folder $folder)
    {
        $folder->slug = str_slug($folder->title).str_random(6);

        dd($folder->slug);
    }
}
