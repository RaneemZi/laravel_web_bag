<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Validation\ValidationRule;

class AuthController extends BaseController
{
    public function register(Request $request)
    {
        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'age' => (int) $request->age,
            'lang' => $request->lang ?? 'en',
            'image' => $request->image,
            'gendre_id' => (int) $request->gendre_id,
        ]);

        $token = $user->createToken("API TOKEN")->plainTextToken;

        $success = [
            'id' => $user->id,
            'user_name' => $user->user_name,
            'age' => (int) $user->age,
            'email' => $user->email,
            'token' => $token,
            'lang' => $user->lang,
            'gendre_id' => $user->gendre_id,
        ];

        return $this->sendResponse($success, 'User sing up successfully');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $token = $user->createToken("API TOKEN")->plainTextToken;

            $success = [
                'id' => $user->id,
                'user_name' => $user->user_name,
                'password' => $user->password,
                'token' => $token,
            ];
            return $this->sendResponse($success, 'User logged in successfully');
        } else {
            return $this->sendError('Please check user_name or password', ['error' => 'Unauthorized']);
        }
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->sendResponse(null, 'User logged out successfully');
    }
}
