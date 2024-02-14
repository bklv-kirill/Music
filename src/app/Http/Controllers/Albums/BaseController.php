<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;

use App\Services\Groups\IndexService as GroupIndexService;
use App\Services\Albums\IndexService;
use App\Services\Albums\StoreService;

class BaseController extends Controller
{
    public $indexService;
    public $storeService;
    public $groupIndexService;

    public function __construct(IndexService $indexService,StoreService $storeService, GroupIndexService $groupIndexService)
    {
        $this->indexService = $indexService;
        $this->storeService = $storeService;
        $this->groupIndexService = $groupIndexService;
    }
}