<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\car;
use Illuminate\Http\Request;
use App\Http\Controllers\Base;
use App\Http\Requests\StorecarRequest;
use App\Http\Requests\UpdatecarRequest;
use App\Http\Resources\CarCollection;

class CarController extends Controller
{

    public function index()
    {
        $car = car::all();
        return   Base::sendResponse(CarCollection::collection($car), 'all cars');
    }


    public function store(StorecarRequest $request)
    { //make user index api baseed on rule=driver
        $car = car::create($request->validated());
        return Base::sendResponse(new CarCollection($car), 'car created successfully');
    }


    public function update(UpdatecarRequest $request, car $car)
    {
        $car->update($request->validated());
        return Base::sendResponse(new carCollection($car), 'car updated successfully');
    }

    public function destroy(car $car)
    {
            $car->delete();
            return Base::sendResponse(new CarCollection($car), 'car deleted successfully');
    }

    public function show(car $car)
    {
        return Base::sendResponse(new CarCollection($car->loadMissing('user','province')), 'in cars');
    }

    public function search(Request $request)
    {
        $car= car::where('number','like',"{$request->number}")->get();
        return   Base::sendResponse(CarCollection::collection($car),'cars search result');
    }


}
