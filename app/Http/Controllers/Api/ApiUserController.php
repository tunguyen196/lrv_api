<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ApiRegisterRequest;
use App\Http\Requests\ApiLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\userResource;
use App\Http\Resources\userTokenResource;

class ApiUserController extends Controller
{
    //
    public function register(ApiRegisterRequest $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return $this->responseSuccess(['data' => new userResource($user)]);
    }

    public function login(ApiLoginRequest $request)
    {

        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($arr)) {
            $idUser = Auth::user()->id;
            $user = User::find($idUser);
            // Creating a token without scopes...
            $user->token = $user->createToken('App')->accessToken;

            return $this->responseSuccess(['data' => new userTokenResource($user)]);
        }

        return $this->responseErrors(trans('auth.failed'));
    }

    public function userInfo(Request $request)
    {
        return $this->responseSuccess(['data' => new userResource($request->user('api'))]);
    }
}
