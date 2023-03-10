<?php

namespace App\Services\Auth;

use App\Interfaces\Auth\AuthServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Iqbalatma\LaravelExtend\BaseService;


class AuthService extends BaseService implements AuthServiceInterface
{
    /**
     * @param array $requestedData
     * @return array
     */
    public function authenticate(array $requestedData): array
    {
        $response = Auth::attempt($requestedData, $requestedData['rememberme'] ?? false) ?
            ["success" => true] :
            ["success" => false, "message" => "Invalid username or password"];
        return $response;
    }

    /**
     * @return array
     */
    public function getDataLogin(): array
    {
        return [
            "title" => "Login"
        ];
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        Auth::logout();
    }
}
