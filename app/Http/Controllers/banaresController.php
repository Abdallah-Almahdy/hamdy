<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class banaresController extends Controller
{
    public function index()
    {
        return view('pages.banares.index');
    }

    public function create()
    {
        return view('pages.banares.create');
    }
}
