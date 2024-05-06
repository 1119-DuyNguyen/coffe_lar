<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:250'],
            'employee_code' => ['nullable'],
            'email' => ['required', 'max:250', 'email:rfc,dns'],
            'phone' => ['required', 'string', 'regex:/^[0-9]{10}$/'],
            'address' => ['required', 'max:250'],
            'day_of_birth' => ['required'],
            'gender' => ['required'],
            'tax_code' => ['required', 'regex:/^[0-9]{10}$/'],
            'bank_number' => ['required', 'numeric'],
        ];
    }
}
