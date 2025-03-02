<?php

namespace App\Http\Controllers;

use App\Http\Resources\HabitatResource;
use App\Models\Habitat;

class HabitatController extends Controller
{
    public function index()
    {
        return HabitatResource::collection(Habitat::all());
    }
}
