<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\violation;
use Illuminate\Http\Request;
use App\Http\Controllers\Base;
use App\Http\Resources\ViolationCollection;
use App\Http\Requests\StoreviolationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\province;
use App\Http\Requests\UpdateviolationRequest;

class ViolationController extends Controller
{
    public function index()
    {

      //  $violation = violation::with('user')->get();
        $violation = violation::all();
        return   Base::sendResponse(ViolationCollection::collection(
            $violation)
            , 'all violoations ');

    }

    public function show(violation $violation)
    {

        // if the param is id use this
        // $n=violation::with('user')
        //->where('id',$violation->id)->first();
        // return Base::sendResponse(new ViolationCollection($n)
        //, ' violation');

        return Base::sendResponse(new ViolationCollection($violation
        ->load('user')
        ->append('post_date','cost','trial_time')
    ), ' violation');

    }

    public function MyViolation()
    {
        $violation = violation::where('user_id','=',Auth::id())->get();
        return   Base::sendResponse(ViolationCollection::collection(
            $violation)
            , 'my violoations ');

    }



    public function store(StoreviolationRequest $request)
    {

        $Violation = violation::create($request->except('user_id') + ['user_id'=>Auth::id()]);
        return Base::sendResponse(new ViolationCollection($Violation
        ->load('user')
        ->append('post_date')
    ), 'Violation created successfully');

    }




    public function destroy(violation $violation)
    {
            $violation->delete();
            return Base::sendResponse(new violationCollection($violation), 'violation deleted successfully');
    }


    public function update(UpdateviolationRequest $request, violation $Violation)
    {
        $Violation->update($request->validated());
        return Base::sendResponse(new ViolationCollection($Violation->append('trial_time')), 'Violation updated successfully');
    }


}
