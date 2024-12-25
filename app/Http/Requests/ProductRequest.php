<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

    public function updateRules()
    {
        return
            [
                'title' => 'string',
                'price' => 'numeric',
                'description' => 'string'
            ];
    }

    public function createRules()
    {
        return
            [
                'title' => 'required',
                'price' => 'required',
                'description' => 'string'
            ];
    }

    public function rules(): array
    {
        if ($this->is('api/products/create')) {
            return $this->createRules();
        } elseif ($this->is('api/products/update/*')) {
            return $this->updateRules();
        }
    }
}
