<?php

namespace App\Http\Controllers\Tracks;

use App\Http\Controllers\Controller;

use App\Services\Groups\IndexService as GroupsIndexService;
use App\Services\Albums\IndexService as AlbumsIndexService;
use App\Services\Tracks\IndexService;
use App\Services\Tracks\StoreService;

class BaseController extends Controller
{
    public $indexService;
    public $storeService;
    public $groupIndexService;
    public $albumIndexService;

    public function __construct(IndexService $indexService,StoreService $storeService, GroupsIndexService $groupIndexService, AlbumsIndexService $albumIndexService)
    {
        $this->indexService = $indexService;
        $this->storeService = $storeService;
        $this->groupIndexService = $groupIndexService;
        $this->albumIndexService = $albumIndexService;
    }
}