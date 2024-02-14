<?php

namespace App\Http\Controllers\Albums;

use App\Http\Requests\Albums\IndexRequest;

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

        $albums = $this->indexService->index($filters)->paginate(5);
        $groups = $this->groupIndexService->index([])->get();

        return view("albums.index", compact(["albums", "groups", "filters"]));
    }
}
