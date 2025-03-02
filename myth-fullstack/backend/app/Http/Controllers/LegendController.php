<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLegendRequest;
use App\Http\Requests\UpdateLegendRequest;
use App\Http\Resources\LegendResource;
use App\Models\Legend;

class LegendController extends Controller
{

    public function index()
    {
        return LegendResource::collection(Legend::with("habitat", "image")->get());
    }
    public function show(Legend $legend)
    {
        return new LegendResource($legend->load("habitat", "image"));
    }
}
