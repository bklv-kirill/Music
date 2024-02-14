<?php

namespace App\Services\Albums;

use App\Http\Filters\Album\AlbumFilter;

use App\Models\Album;

class IndexService
{
    public function index(array $filters)
    {
        $filter = app()->make(AlbumFilter::class, ["queryParams" => $filters]);
        $albums = Album::filter($filter);

        return $albums;
    }
}