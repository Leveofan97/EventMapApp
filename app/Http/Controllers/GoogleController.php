<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class GoogleController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
        $this->middleware('auth:api', ['except' => ['redirectToGoogle','handleGoogleCallback']]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return //\Illuminate\Http\JsonResponse
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){
                if ($token = $this->guard()->attempt(['login'=>$finduser->getLogin(),
                                                      'password'=>$user->email . "@" . $user->id]))
                {
                    //return $this->respondWithToken($token);
                    return redirect('http://localhost:3000/social-auth?token=' . $token);
                }
            }else{
                $newUser = User::create([
                    'first_name' => $user->user["given_name"],
                    'last_name' => $user->user["family_name"],
                    'login' => $user->nickname == null ? $user->email : $user->nickname,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => bcrypt($user->email . "@" . $user->id),
                    'is_active' => 1
                ]);
                $token = $this->guard()->attempt(['login'=>$newUser['login'], 'password'=>$newUser['email'] . "@" . $newUser['google_id']]);
                return redirect('http://localhost:3000/social-auth?token=' . $token);
/*
                if ($token = $this->guard()->attempt(['login' => $newUser->login, 'password' => $user->email . "@" . $user->id])) {
                    return $this->respondWithToken($token);
                }*/
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Получить структура массива токена.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard('api');
    }
}
