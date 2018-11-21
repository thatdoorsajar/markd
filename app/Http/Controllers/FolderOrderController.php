<?php

namespace App\Http\Controllers;

use App\Mrkd\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FolderOrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // @TODO: validation pre move here
        
        $folder = Folder::find($request->folder_id);

        $newParent = Folder::find($request->new_parent_id);

        $newParent->appendNode($folder);

        return response()->json([
            'success'           => true,
            'updatedFolderSlug' => $folder->fresh()->slug,
            'foldersFlat'       => $request->user()->folders,
            'foldersTree'       => $request->user()->folders->toTree()
        ]);
    }
}
