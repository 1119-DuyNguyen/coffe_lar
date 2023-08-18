<?php

namespace App\Http\Requests\Backend;

use App\Models\Category;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
            'name' => ['required', 'max:200'],
            'description' => ['nullable', 'max:200'],
            'permissions'=>['required','array'],
            ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'Slug name has already been taken. Please try another name !!!',
        ];
    }
}
