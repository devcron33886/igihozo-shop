<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('order_create');
    }

    public function rules(): array
    {
        return [
            'order_no' => [
                'string',
                'required',
            ],
            'client_name' => [
                'string',
                'required',
            ],
            'client_phone' => [
                'string',
                'required',
            ],
            'shipping_address' => [
                'string',
                'required',
            ],
            'notes' => [
                'required',
            ],
            'payment_method_id' => [
                'required',
                'integer',
            ],
            'shipping_method_id' => [
                'required',
                'integer',
            ],
            'total' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
