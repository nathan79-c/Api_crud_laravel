<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogUserRequest;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterUser $Register,User $user)
    {
        try{
            $user->name = $Register->name;
            $user->email = $Register->email;
            $user->password = Hash::make($Register->password,[
                'rounds' =>12
            ]);
            $user->save();
             return response()->json([
                'status_code'=>200,
                'status_message'=>'le User a ete ajouter',
                'data' =>$user
            ]);

        }catch(Exception $e){
            return response()->json($e);
        }
    }
    public function login(LogUserRequest $Request)
    {
        if(auth()->attempt($Request->only(['email','password']))){
            return response()->json([
                'status_code'=>402,
                'status_message'=>'le User est connecter',

            ]);

        }else{
            return response()->json([
                'status_code'=>403,
                'status_message'=>'le User a ne pas cree',

            ]);

        }
    }
}
