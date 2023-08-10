<?php

namespace App\Http\Requests\Backend;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'icon' => ['required', 'not_in:empty'],
            'name' => ['required', 'max:200', Rule::unique(Category::class,'slug')->ignore(Str::slug($this->input('name')),'slug')],
            'status' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'Slug name has already been taken. Please try another name !!!',
        ];
    }
}
