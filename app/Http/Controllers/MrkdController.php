<?php

namespace App\Http\Controllers;

use App\Mrkd\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MrkdController extends Controller
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
            'foldersFlat' => $currentUser->folders,
            'foldersTree' => $currentUser->folders->toTree()
        ]);
    }
}
