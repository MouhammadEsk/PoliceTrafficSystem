<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreviolationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'number'=>['integer','required'],
            'important'=>['boolean','required'],
            'location'=>['string','required'],
            'post_date'=>['date','required'],
            'car_id'=>['integer','required','exists:cars,id'],
            'violation_type_id'=>['integer','required','exists:violation_types,id'],
            'province_id'=>['integer','required','exists:provinces,id']
                ];
    }
}
