<?php

namespace App\Http\Controllers\Admin;

use App\Horse;
use App\Http\Requests\Admin\Horse\HorseStoreRequest;
use App\Http\Requests\Admin\Horse\HorseUpdateRequest;
use App\Http\Resources\Admin\HorseResource;
use App\Owner;
use App\Rider;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HorseController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->per_page ?? 25;
        return HorseResource::collection(Horse::orderBy('created_at', 'desc')->paginate($per_page)->appends($request->only('per_page')));
    }

    public function store(HorseStoreRequest $request)
    {
        $horse = Horse::create([
            'breed' => $request->breed,
            'color' => $request->color,
            'age' => $request->age,
        ]);
        if ($request->riders){
            $riders = Rider::whereIn('id', $request->rider)->get();
            $horse->riders()->sync($riders);
        }
        if ($request->owner){
            $owner = Owner::where('id', $request->id)->first();
            $horse->owner()->save($owner);
        }
        return HorseResource::make($horse->load(['owner', 'riders']));
    }

    public function show(Horse $horse)
    {
        return HorseResource::make($horse->load(['owner', 'riders']));
    }

    public function update(HorseUpdateRequest $request, Horse $horse)
    {
        //
    }

    public function destroy(Horse $horse)
    {
        //
    }
}
