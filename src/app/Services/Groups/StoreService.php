<?php

namespace App\Services\Groups;

use Illuminate\Http\RedirectResponse;

use App\Models\Group;

class StoreService
{
    public function store(array $validated): RedirectResponse
    {
        if (Group::where("title", $validated["title"])->exists())
        return redirect()->route("groups.create")->withInput()->withErrors(["create" => "Create Error"]);

        Group::create($validated);

        return redirect()->route("groups.index");
    }
}