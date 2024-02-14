<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

use App\Models\Album;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Album $album): RedirectResponse
    {
        Gate::authorize("album-update");

        $album->delete();

        return redirect()->route("albums.index");
    }
}
