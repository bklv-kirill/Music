<?php

namespace App\Http\Controllers\Tracks;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

use App\Models\Track;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Track $track): RedirectResponse
    {
        Gate::authorize("track-update");

        $track->delete();
        
        return redirect()->route("tracks.index");
    }
}
