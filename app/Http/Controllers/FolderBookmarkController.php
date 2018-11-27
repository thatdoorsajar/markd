<?php

namespace App\Http\Controllers;

use App\Mrkd\Folder;
use App\Mrkd\Bookmark;
use Illuminate\Http\Request;
use App\Jobs\ProcessBookmarkUrl;
use App\Http\Controllers\Controller;

class FolderBookmarkController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Folder $folder, Request $request)
    {
        ProcessBookmarkUrl::dispatch(
            $request->new_bookmark_url,
            $folder->id
        );

        return response()->json([
            'success'     => true,
            'foldersFlat' => $request->user()->folders,
            'foldersTree' => $request->user()->folders->toTree()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(Folder $folder, Bookmark $bookmark, Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder, Bookmark $bookmark)
    {
        //
    }
}
