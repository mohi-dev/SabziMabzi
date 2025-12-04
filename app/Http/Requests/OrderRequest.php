<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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

    public function createRules()
    {
        return
            [
                'quantity' => 'required',
                'cost' => 'required',
                'order_date' => ['required', 'date_format:Y-m-d H:i:s'],
                'delivery_time' => ['required', 'date_format:Y-m-d H:i:s'],
                'description' => 'string',
                'user_id' => ['required', 'integer'],
                'product_id' => ['required', 'integer']
            ];
    }

    public function rules(): array
    {
        if ($this->is('api/orders/add')) {
            return $this->createRules();
        }
    }
}
