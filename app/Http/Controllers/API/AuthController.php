<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function registerNewUser(Request $post)
    {
        $validator = Validator::make($post->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(errorResponse('Validation error, please check your credentials.'), 200);
        }
        $newUser = User::create([
            'status' => 'testuser',
            'name' => ucwords($post->name),
            'email' => $post->email,
            'password' => bcrypt($post->password),
            'code' => createNewUserCode()
        ]);
        if ($newUser) {
            $response = [
                'name' => $newUser->name,
                'token' => $newUser->createToken('_appToken')->accessToken
            ];
            return response()->json(successResponse('Successfully registered new user.', $response), 200);
        }
        return response()->json(errorResponse('Failed to register new user.'), 200);
    }

    public function signupUser(Request $post)
    {
        $validator = Validator::make($post->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(errorResponse('Validation error, please check your credentials.'), 200);
        }

        if (Auth::attempt(['email' => $post->email, 'password' => $post->password])) {
            $user = Auth::user();
            $response = [
                'name' => $user->name,
                'token' => $user->createToken('_appToken')->accessToken
            ];
            return response()->json(successResponse('', $response), 200);
        } else {
            return response()->json(errorResponse('Account not found !'), 200);
        }
    }
}
