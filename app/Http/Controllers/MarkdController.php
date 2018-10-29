<?php

namespace App\Http\Controllers;

use App\Markd\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MarkdController extends Controller
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
        $currentUser = Auth::user();

        return view('app.layout')->with([
            'currentUser' => $currentUser,
            'folderTop'   => $currentUser->topFolder(),
            'foldersFlat' => $currentUser->folders,
            'foldersTree' => $currentUser->folders->where('top_folder', false)->toTree()
        ]);
    }
}
