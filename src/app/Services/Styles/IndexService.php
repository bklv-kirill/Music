<?php

namespace App\Services\Styles;

use App\Models\Style;

class indexService
{
    public function index()
    {
        return Style::get();
    }
}