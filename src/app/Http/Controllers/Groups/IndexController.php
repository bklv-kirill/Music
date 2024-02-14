<?php

namespace App\Http\Controllers\Groups;

use App\Http\Requests\Groups\IndexRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(IndexRequest $indexRequest): View
    {
        $filters = $indexRequest->validated();
        if (!isset($filters["date"])) $filters["date"] = "new";

        $groups = $this->indexService->index($filters)->paginate(5);
        $styles = $this->styleIndexService->index();

        return view("groups.index", compact(["groups", "styles", "filters"]));
    }
}
