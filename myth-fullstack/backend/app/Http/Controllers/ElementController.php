<?php

namespace App\Http\Controllers;

use App\Http\Resources\ElementResource;
use App\Models\Element;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    public function index()
    {
        return ElementResource::collection(Element::all());
    }
}
