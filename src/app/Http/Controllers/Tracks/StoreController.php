<?php

namespace App\Http\Controllers\Tracks;

use App\Http\Controllers\Controller;

use App\Http\Requests\Tracks\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $storeRequest): RedirectResponse
    {
        $validated = $storeRequest->validated();

        $redirect = $this->storeService->store($validated);

        return $redirect;
    }
}
