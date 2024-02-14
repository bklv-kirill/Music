<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\AuthRequest;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthRequest $authRequest): RedirectResponse
    {
        $validated = $authRequest->validated();

        $redirect = redirect()->route("admin.index");

        return Auth::attempt($validated) ? $redirect : $redirect->withInput()->withErrors(["auth" => "Auth Error"]);
    }
}
