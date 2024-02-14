<?php

namespace App\Http\Controllers\Groups;

use Illuminate\Support\Facades\Gate;

use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        Gate::authorize("group-update");

        $styles = $this->styleIndexService->index();

        return view("groups.create", compact("styles"));
    }
}
