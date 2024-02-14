<?php

namespace App\Services\Tracks;

use App\Http\Filters\Track\TrackFilter;

use App\Models\Track;

class IndexService
{
    public function index(array $filters)
    {
        $filter = app()->make(TrackFilter::class, ["queryParams" => $filters]);
        $tracks = Track::filter($filter);

        return $tracks;
    }
}