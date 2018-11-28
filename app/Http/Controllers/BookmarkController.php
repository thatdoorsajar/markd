<?php

namespace App\Http\Controllers;

use App\Mrkd\Bookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookmarkController extends Controller
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
     * Archive the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function archive(Bookmark $bookmark)
    {
        $bookmark->delete();

        return response()->json([
            'success' => $bookmark->delete()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function delete(Bookmark $bookmark)
    {
        $bookmark->forceDelete();

        return response()->json([
            'success' => $bookmark->forceDelete()
        ]);
    }    
}
