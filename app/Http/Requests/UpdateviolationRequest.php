<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateviolationRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'number'=>['integer','required'],
            'important'=>['boolean','required'],
            'title'=>['string','required'],
            'location'=>['string','required'],
            'post_date'=>['date','required'],
            'trial_time'=>['string','required'],
            'car_id'=>['integer','required','exists:cars,id'],
            'violation_type_id'=>['integer','required','exists:violation_types,id'],
            'province_id'=>['integer','required','exists:provinces,id'],
            'user_id'=>['integer','required','exists:users,id']
        ];
    }
}
