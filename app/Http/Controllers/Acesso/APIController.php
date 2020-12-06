<?php

namespace App\Http\Controllers\Acesso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use JWTAuth;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegistrationFormRequest;


class APIController extends Controller
{
    /**
     * @group Auth
     * 
     * Register
     * Register a new user
     * 
     * @bodyParam name string required User's name. Example: sr smith
     * @bodyParam email string required User's email. Example: smith@email.com
     * @bodyParam password string required User's password. Example: secret
     * 
     * @response 200
     * {
     *     "success": true,
     *     "data": {
     *         "name": "sr smith",
     *         "email": "smith@email.com",
     *         "updated_at": "2020-04-28T13:28:08.000000Z",
     *         "created_at": "2020-04-28T13:28:08.000000Z",
     *         "id": 1
     *     }
     * }
     * 
     * @response 422
     * {
     *     "message": "The given data was invalid.",
     *     "errors": {
     *         "email": [
     *             "The email field is required."
     *         ]
     *     }
     * }
     * 
     * @param RegistrationFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegistrationFormRequest $request)
    {
        $user = new User();
    
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
    
        return response()->json([
            'success'   =>  true,
            'data'      =>  $user
        ], 200);
    }

    /**
     * @group Auth
     * 
     * Login
     * Logs in the user, receiving the token in response
     * 
     * @bodyParam email string required Email do usuário. Example: smith@email.com
     * @bodyParam password string required Senha do usuário. Example: secret
     * 
     * @response 200
     * {
     *     "success": true,
     *     "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9..."
     * }
     * 
     * @response 401
     * {
     *     "success": false,
     *     "message": "Invalid Email or Password"
     * }
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;
    
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
    
        return response()->json([
            'success' => true,
            'token'   => $token,
        ]);
    }

    /**
     * @group Auth
     * 
     * Logout
     * Logout is invalidate the token
     * 
     * @bodyParam token string required User's token. Example: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...
     * 
     * @response 200
     * {
     *     "success": true,
     *     "message": "User logged out successfully"
     * }  
     * 
     * @response 401
     * {
     *     "message": "Token not provided"
     * }
     * 
     * @response 422
     * {
     *     "message": "The given data was invalid.",
     *     "errors": {
     *         "token": [
     *             "The token field is required."
     *         ]
     *     }
     * }
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
    
        try {
            JWTAuth::invalidate($request->token);
    
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    /**
     * @group Auth
     * 
     * Me
     * Return the user by the token
     * 
     * @response 200
     * {
     *     "id": 1,
     *     "name": "sr smith",
     *     "email": "smith@email.com",
     *     "email_verified_at": null,
     *     "created_at": "2020-04-28T13:28:08.000000Z",
     *     "updated_at": "2020-04-28T13:28:08.000000Z"
     * }
     * 
     * @response 401
     * {
     *     "message": "Token not provided"
     * }
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
}
