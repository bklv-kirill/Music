<?php

namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

use App\Models\Group;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Group $group): RedirectResponse
    {
        Gate::authorize("group-update");
        
        $group->delete();

        return redirect()->route("groups.index");
    }
}
