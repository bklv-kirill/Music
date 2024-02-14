<?php

namespace App\Http\Controllers\Albums;

use Illuminate\Support\Facades\Gate;

use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        Gate::authorize("album-update");

        $groups = $this->groupIndexService->index([])->get();

        return view("albums.create", compact("groups"));
    }
}
