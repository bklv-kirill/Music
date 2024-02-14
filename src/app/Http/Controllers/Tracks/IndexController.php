<?php

namespace App\Http\Controllers\Tracks;

use App\Http\Requests\Tracks\IndexRequest;

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

        $tracks = $this->indexService->index($filters)->paginate(5);
        $groups = $this->groupIndexService->index([])->get();
        $albums = $this->albumIndexService->index([])->get();

        return view("tracks.index", compact(["tracks", "groups", "albums", "filters"]));
    }
}
