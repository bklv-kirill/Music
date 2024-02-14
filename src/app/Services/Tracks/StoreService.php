<?php

namespace App\Services\Tracks;

use Illuminate\Http\RedirectResponse;

use App\Models\Album;
use App\Models\Track;

class StoreService
{
    public function store(array $validated): RedirectResponse
    {
        $album = Album::where("id", $validated["album_id"])->first();
        if (!$album) return redirect()->route("tracks.create")->withInput()->withErrors(["create" => "Need Album"]);
        
        $validated["group_id"] = $album->group_id;

        if (Track::where("title", $validated["title"])->exists())
        return redirect()->route("tracks.create")->withInput()->withErrors(["create" => "Create Error"]);

        Track::create($validated);

        return redirect()->route("tracks.index");
    }
}