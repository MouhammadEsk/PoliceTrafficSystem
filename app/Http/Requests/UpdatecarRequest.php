<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatecarRequest extends FormRequest
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
            'brand'=>['string','required'],
            'type'=>['string','required'],
            'model'=>['string','required'],
            'year'=>['string','required'],
            'category'=>['string','required'],
            'color'=>['string','required'],
            'province_id'=>['integer','required','exists:provinces,id'],
            'user_id'=>['integer','required','exists:users,id']
        ];
    }
}
