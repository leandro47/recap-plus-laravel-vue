<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Validations\UserValidation;
use App\Models\User;

/**
 * Manager user
 * @author Leandro da Silva <leandrosilva47@live.com>
 */
class UserController extends Controller
{
    /**
     * Make login user
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $response['data'] = [];
        $response['status'] = Response::HTTP_CREATED;

        $validate = UserValidation::formValidate($request->all());

        if (!empty($validate)) {
            $response['data'] = $validate;
            $response['status'] = Response::HTTP_UNAUTHORIZED;

            return response()->json($response, $response['status']);
        }

        if (Auth::attempt($request->only('email', 'password'))){
            return response()->json(Auth::user(), Response::HTTP_OK);
        }

        $response['data'] = 'Email ou senha inválidos!';
        $response['status'] = Response::HTTP_UNAUTHORIZED;

        return response()->json($response, $response['status']);
    }

    /**
     * Logout user
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
    }

    /**
     * Create a new account for user
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' =>['required', 'min:6', 'confirmed']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }
}
