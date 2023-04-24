<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Base;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\violation_type;
use App\Http\Resources\ViolationTypeCollection;
use App\Http\Requests\Storeviolation_typeRequest;
use App\Http\Requests\Updateviolation_typeRequest;

class ViolationTypeController extends Controller
{

    public function index()
    {


        $violation_types = violation_type::all();
        return   Base::sendResponse(ViolationTypeCollection::collection($violation_types), 'all ViolationTypes');


    }


    public function store(Storeviolation_typeRequest $request)
    {
        $ViolationType = violation_type::create($request->validated());
        return Base::sendResponse(new ViolationTypeCollection($ViolationType), 'ViolationType created successfully');
    }

    public function show(violation_type $ViolationType)
    {

            return Base::sendResponse(new ViolationTypeCollection($ViolationType), 'ViolationType sent successfully');
    }


    public function update(Updateviolation_typeRequest $request, violation_type $ViolationType)
    {
        $ViolationType->update($request->validated());
        return Base::sendResponse(new ViolationTypeCollection($ViolationType), 'ViolationType updated successfully');
    }

    public function destroy(violation_type $ViolationType)
    {
            $ViolationType->delete();
            return Base::sendResponse(new ViolationTypeCollection($ViolationType), 'ViolationType deleted successfully');
    }

}
