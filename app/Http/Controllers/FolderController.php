<?php

namespace App\Http\Controllers;

use App\Markd\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        // dd($request->parent_id);

        $parent = Folder::find($request->parent_id);

        // dd($parent);

        $child = new Folder;
        $child->title = $request->folder_title;
        $child->description = '';
        $child->user_id = \Auth::id();
        $child->save();

        $parent->appendNode($child);

        return redirect()->route('app.home');
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
