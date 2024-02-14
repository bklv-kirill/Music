<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;

use Illuminate\View\View;

use App\Models\Album;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Album $album): View
    {
        $tracks = $album->tracks;
        
        return view("albums.show", compact(["album", "tracks"]));
    }
}
