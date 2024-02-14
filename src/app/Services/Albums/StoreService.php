<?php

namespace App\Services\Albums;

use Illuminate\Http\RedirectResponse;

use App\Models\Album;
use App\Models\Group;

class StoreService
{
    public function store(array $validated): RedirectResponse
    {
        $group = Group::where("id", $validated["group_id"])->first();
        if (!$group) return redirect()->route("albums.create")->withInput()->withErrors(["create" => "Need Group"]);

        if (Album::where("title", $validated["title"])->exists())
        return redirect()->route("albums.create")->withInput()->withErrors(["create" => "Create Error"]);

        Album::create($validated);

        return redirect()->route("albums.index");
    }
}