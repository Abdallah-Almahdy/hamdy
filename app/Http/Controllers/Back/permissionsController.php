<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;


class permissionsController extends Controller
{
    public function index()
    {
        return view('pages.Permissions.index');
    }
}
