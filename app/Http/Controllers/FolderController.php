<?php

namespace App\Http\Controllers;

use App\Mrkd\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success'     => true,
            'foldersFlat' => $request->user()->folders,
            'foldersTree' => $request->user()->folders->toTree()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $folder = new Folder;
        $folder->title = $request->folder_title;
        $folder->description = '';
        $folder->user_id = $user->id;
        $folder->save();

        if (!empty($request->parent_id)) {
            $parent = Folder::find($request->parent_id);

            $parent->appendNode($folder);
        }

        return response()->json([
            'success'       => true,
            'newFolderSlug' => $folder->slug,
            'foldersFlat'   => $user->folders,
            'foldersTree'   => $user->folders->toTree()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Folder $folder, Request $request)
    {
        $folder->update(['title' => $request->folder_title]);

        return response()->json([
            'success'           => true,
            'updatedFolderSlug' => $folder->fresh()->slug,
            'foldersFlat'       => $request->user()->folders,
            'foldersTree'       => $request->user()->folders->toTree()
        ]);
    }

    /**
     * Archive the specified resource.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function archive(Folder $folder, Request $request)
    {
        $folder->bookmarks()->delete();

        $folder->children()->delete();

        return response()->json([
            'success'          => $folder->delete(),
            'parentFolderSlug' => $folder->parent->slug,
            'foldersFlat'      => $request->user()->folders,
            'foldersTree'      => $request->user()->folders->toTree()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function delete(Folder $folder)
    {
        $folder->bookmarks()->forceDelete();

        return response()->json([
            'success' => $folder->forceDelete()
        ]);
    }
}
