<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Base;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserColliction;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $input=$request->validated();
        $input['password']=Hash::make($input['password']);

        $user=User::create($input);
        $user->assignRole('User');
        $token['token']=$user->createtoken('yaya yoyo yeye')->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token,
        ];
        return Base::sendResponse($response,'user registed successfully Please Wait Untile The Admin Approve Your Request ');
    }

    public function login(LoginRequest $request){

        $user=User::where('email',$request->email )->first();
        if (!$user) {
            return Base::sendError('no such email');
        }

        if (!Hash::check($request->password ,$user->password)) {
            return Base::sendError('Incorrect password');
        }

        $token['token']=$user->createtoken('yaya yoyo yeye')->plainTextToken;



        $response=[
            'user'=>new UserColliction($user->append('DOB','nationallity','blood_type','email','phone')),
            'token'=>$token,
            'role'=>$user->roles
        ];
        return Base::sendResponse($response,'you logged in');
    }


}
