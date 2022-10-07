<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentMethodRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_method_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:payment_methods,name,'.request()->route('payment_method')->id,
            ],
        ];
    }
}
