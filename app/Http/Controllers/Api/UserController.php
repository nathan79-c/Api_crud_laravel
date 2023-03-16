<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUser;
use App\Http\Controllers\Controller;
use Exception;

class UserController extends Controller
{
    public function register(RegisterUser $Register,User $user)
    {
        try{
            $user->name = $Register->name;
            $user->email = $Register->email;
            $user->password = $Register->password;
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
}
