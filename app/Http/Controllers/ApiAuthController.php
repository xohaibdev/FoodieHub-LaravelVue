<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Helper;
use Exception;

class ApiAuthController extends Controller
{
    use Helper;

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user->is_admin) {
                    $token = $user->createToken('authToken')->plainTextToken;
                    return $this->result(true, ['token' => $token], [], 'Logged in successfully!', 200);
                } else {
                    Auth::logout();
                    return $this->result(false, [], ['error' => 'Unauthorized'], 'Only admins are allowed.', 401);
                }
            }

            return $this->result(false, [], ['error' => 'Unauthorized'], 'Invalid credentials', 401);
        } catch (Exception $e) {
            return $this->result(false, [], [], $e->getMessage(), 500);
        }
    }
}
