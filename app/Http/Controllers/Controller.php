<?php

namespace App\Http\Controllers;

use App\Accounts\User;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function folderJson(User $user, Collection $folders)
    {
        // return response()->json([
            
        // ]);
    }
}
