<?php

namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;

use App\Services\Styles\IndexService as StylesIndexService;
use App\Services\Groups\IndexService;
use App\Services\Groups\StoreService;

class BaseController extends Controller
{
    public $indexService;
    public $storeService;
    public $styleIndexService;

    public function __construct(IndexService $indexService,StoreService $storeService, StylesIndexService $styleIndexService)
    {
        $this->indexService = $indexService;
        $this->storeService = $storeService;
        $this->styleIndexService = $styleIndexService;
    }
}