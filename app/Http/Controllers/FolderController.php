<?php

namespace App\Http\Controllers;

use App\Markd\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $folder = new Folder;
        $folder->title = $request->folder_title;
        $folder->description = '';
        $folder->user_id = Auth::id();
        $folder->save();

        if (!empty($request->parent_id)) {
            $parent = Folder::find($request->parent_id);

            $parent->appendNode($child);
        }

        return response()->json([
            'success' => true,
            'folders' => Folder::where('user_id', Auth::id())->get()->toTree()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        $folder->load('bookmarks');
        
        return view('markd.folder', compact('folder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
        //
    }
}
