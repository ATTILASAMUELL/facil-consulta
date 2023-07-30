<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Helps\Traits\ReturnHelp;

class UserController extends Controller
{
    use ReturnHelp;

    public function login(UserRequest $userRequest){
        try {
            $credentiais = $userRequest->only(['email','password']);

            if(!$token = auth()->attempt($credentiais)) {
                $this->getReturnErrorJson();
            }
            
            return response()->json([
                'data'=>[
                    'token' => $token,
                    'token_type'=> 'Bearer',
                    'expires_in'=> auth()->factory()->getTTL() *60
                ]
            ]);
        } catch (\Exception $e) {
            $this->getReturnErrorJson();
        }
            
    }
}
