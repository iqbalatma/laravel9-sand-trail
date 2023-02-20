<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(AuthService $service)
    {
        return view('auth.login', $service->getDataLogin());
    }

    public function authenticate(AuthService $service, AuthenticateRequest $request): RedirectResponse
    {
        $response = $service->authenticate($request->validated());

        if ($this->isError($response))
            return $this->getErrorResponse();

        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

    public function logout(AuthService $service, Request $request)
    {
        $service->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("auth.login");
    }
}
