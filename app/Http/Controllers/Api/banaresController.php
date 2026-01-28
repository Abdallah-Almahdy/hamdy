<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\banaresResource;
use App\Models\banares;

class banaresController extends Controller
{
    public function get_banares()
    {
        $data = banares::all();

        return  banaresResource::collection($data);
    }
}
