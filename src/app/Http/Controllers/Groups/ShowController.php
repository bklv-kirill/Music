<?php

namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;

use Illuminate\View\View;

use App\Models\Group;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Group $group): View
    {
        $albums = $group->albums;
        
        return view("groups.show", compact(["group", "albums"]));
    }
}
