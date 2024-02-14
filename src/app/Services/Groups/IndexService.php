<?php

namespace App\Services\Groups;

use App\Http\Filters\Group\GroupFilter;

use App\Models\Group;

class IndexService
{
    public function index(array $filters)
    {
        $filter = app()->make(GroupFilter::class, ["queryParams" => array_filter($filters)]);
        $groups = Group::filter($filter);
        
        return $groups;
    }
}