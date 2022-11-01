<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string',
            ],
            'mobile' => ['required', 'min:10'],
            'email' => ['required', 'email'],
            'shipping_address' => ['required'],
            'payment_method_id' => ['integer', 'required'],
            'shipping_type_id' => ['integer', 'required'],
            'total' => ['required'],
        ];
    }
}
