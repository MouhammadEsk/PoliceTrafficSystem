<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Base;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserColliction;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{

    public function index(){
        $user = User::all()->load('Roles');
        return Base::sendResponse($user,'All Users With Roles');
    }




    public function grant(Request $request){
        $user=User::with('Roles')->findOrFail($request->user_id);
        $user->removeRole('User');
        $user->assignRole($request->role);
        return Base::sendResponse($user,'Role Granted Succesfully');
    }


    public function revoke(Request $request){
        $user=User::with('Roles')->findOrFail($request->user_id);
        $user->removeRole($request->role);
        $user->assignRole('User');
        return Base::sendResponse($user,'Role Revoked Succesfully');
    }

}
