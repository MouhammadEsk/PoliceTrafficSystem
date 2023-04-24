<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\province;
use App\Http\Controllers\Base;
use App\Http\Requests\StoreprovinceRequest;
use App\Http\Requests\UpdateprovinceRequest;
use App\Http\Resources\ProvinceCollection;

class ProvinceController extends Controller
{


    public function index()
    {
        // $province = province::paginate(5);
        // return   Base::sendResponse(
        //     ProvinceCollection::collection($province)->response()->getData(true)
        //     , 'all provinces');

        $province = province::all();
        return   Base::sendResponse(ProvinceCollection::collection($province), 'all provinces');

        // $province = province::find(1);
        // return   Base::sendResponse(new ProvinceCollection($province), ' one provinces');
    }


    public function store(StoreprovinceRequest $request)
    {
        $province = province::create($request->validated());
        return Base::sendResponse(new ProvinceCollection($province), 'province created successfully');
    }


    public function update(UpdateprovinceRequest $request, province $province)
    {
        $province->update($request->validated());
        return Base::sendResponse(new ProvinceCollection($province), 'province updated successfully');
    }

    public function destroy(province $province)
    {
            $province->delete();
            return Base::sendResponse(new ProvinceCollection($province), 'province deleted successfully');
    }
}
