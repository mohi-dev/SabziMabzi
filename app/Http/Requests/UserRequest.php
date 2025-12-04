<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name' => 'required',
                'address' => 'required',
                'phone' => ['required', 'regex:/^(09)(\d{9})$/im'],
            ];
    }

    public function rules(): array
    {
        if ($this->is('api/users/add')) {
            return $this->createRules();
        }
        return [];
    }
}
