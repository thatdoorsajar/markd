<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function() {
    // Authenticated User
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Folders
    Route::get('/folder', 'FolderController@index');
    Route::post('/folder', 'FolderController@store');
    Route::patch('/folder/{folder}', 'FolderController@update');

    // Folder Order
    Route::patch('/folder-order', 'FolderOrderController@update');
    
    // Bookmarks
    Route::post('/folder/{folder}/bookmark', 'BookmarkController@store');
    Route::patch('/folder/{folder}/bookmark', 'BookmarkController@update');
});
