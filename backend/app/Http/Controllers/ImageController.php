<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show(Image $image)
    {
        return new ImageResource($image);
    }

    public function index(Request $request){
        $images = Image::all();
        if($request->has('category')){
            $images = $images->where('category', $request->category);
        }
        if($request->has('order')){
            $images = $images->sortByDesc("created_at");
        }
        return ImageResource::collection($images);
    }

    public function store(StoreImageRequest $request)
    {
        $file = $request->file("original");
        $data =
        [
            "name" => $request->only("name")["name"],
            "original" => $file->get(),
            "type" => $file->getMimeType(),
            "category" => $request->only("category")["category"],
        ];

        $image = Image::create($data);
        return new ImageResource($image);
    }
}
