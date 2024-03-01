<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'integer',
            'count' => 'integer',
            'product_id' => 'integer',
            'user_id' => 'integer',
            'postcode' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'detail_address' => ['required', 'string', 'max:255'],
            'delivery_request' => ['required', 'string', 'max:255'],
            'credit_card' => ['required', 'string', 'max:255'],
            'installment' => ['required', 'string', 'max:255'],
        ];
    }
}
