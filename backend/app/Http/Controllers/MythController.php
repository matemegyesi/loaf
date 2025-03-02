<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMythRequest;
use App\Http\Requests\UpdateMythRequest;
use App\Http\Resources\MythResource;
use App\Models\Habitat;
use App\Models\Image;
use App\Models\Myth;
use App\Models\Size;
use Illuminate\Http\Request;

class MythController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Myth::with("habitat", "size", "image", "elements");

        if($name = $request->query('name')) {
            $query->where('name', 'like', "%$name%");
        }

        if ($habitat = $request->query('habitat_id')) {
            $query->where('habitat_id', $habitat);
        }

        if ($size = $request->query('size_id')) {
            $query->where('size_id', $size);
        }

        if($elements = $request->query('elements')) {
            foreach ($elements as $element_id) {
                $query->whereHas('elements', function ($query) use ($element_id) {
                    $query->where('id', $element_id);
                });
            }
        }

        // return $query->toRawSql();
        return MythResource::collection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMythRequest $request)
    {
        $myth = Myth::create($request->except(["elements"]));
        foreach ($request->only(["elements"])["elements"] as $id)
        {
            $myth->elements()->attach($id);
        }
        return new MythResource($myth->load("habitat", "size", "image", "elements"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMythRequest $request, Myth $myth)
    {
        $myth->update($request->only(["name", "desc"]));
        $myth->habitat()->associate(Habitat::findOrFail($request->habitat_id));
        $myth->size()->associate(Size::findOrFail($request->size_id));
        $myth->image()->associate(Image::findOrFail($request->image_id));
        $myth->save();
        $myth->elements()->detach();
        foreach ($request->only(["elements"])["elements"] as $id)
        {
            $myth->elements()->attach($id);
        }
        return new MythResource($myth->load(["habitat", "size", "image", "elements"]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Myth $myth)
    {
        $myth->elements()->detach();
        return $myth->delete() ? response()->noContent() : abort(500);
    }
}
