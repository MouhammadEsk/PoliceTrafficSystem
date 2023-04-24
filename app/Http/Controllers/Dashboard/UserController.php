<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Base;
use App\Models\User;

use App\Http\Resources\CarCollection;
use Illuminate\Http\Request;
use App\Models\car;


class UserController extends Controller
{

    public function indexUserCars(Request $request)
    {
        $car = car::all()->where('user_id','like',"{$request->user_id}");
        return   Base::sendResponse(CarCollection::collection($car),
        'all user cars');
    }

    public function find(Request $request)
    {
        $car= car::where('number','like',"{$request->number}")->get();
        return   Base::sendResponse(CarCollection::collection($car->load('user'))
        ,'search the car owner by num');
    }




}
