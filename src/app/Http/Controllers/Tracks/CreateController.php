<?php

namespace App\Http\Controllers\Tracks;

use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $albums = $this->albumIndexService->index([])->get();

        return view("tracks.create", compact("albums"));
    }
}
