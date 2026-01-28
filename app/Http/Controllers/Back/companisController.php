<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\company;
use App\Models\section;

class companisController extends Controller
{
    public function index()
    {

        $companies = company::all();
        return view('pages.companies.index', [
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $sections = section::all();
        $companies = company::all();
        return view(
            'pages.companies.create',
            [
                'sections' => $sections,
                'companies' => $companies
            ]
        );
    }
}
