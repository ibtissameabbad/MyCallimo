<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

  class AuthController extends Controller
{

    public function register(Request $request)

    {
        $user = User::create([

            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'chat_status' => $request->chat_status,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'enable' => $request->enable,
            'role_id' => $request->role_id,
            'email' => $request->email,

            'password' => bcrypt($request->password)

        ]);

 

        $token = $user->createToken('TutsForWeb')->accessToken;

 

        return response()->json(['token' => $token], 200);

    }

    public function login(Request $request)

    {

        $credentials = [

            'email' => $request->email,

            'password' => $request->password

        ];

 

        if (auth()->attempt($credentials)) {

            $token = auth()->user()->createToken('TutsForWeb')->accessToken;

            return response()->json(['token' => $token], 200);

        } else {

            return response()->json(['error' => 'UnAuthorised'], 401);

        }

    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }

        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    private function guard()
    {
        return Auth::guard();
    }
}
