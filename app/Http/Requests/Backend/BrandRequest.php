<?php

namespace App\Http\Requests\Backend;

use App\Models\Brand;
use App\Models\ChildCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
            'logo' => ['image', 'max:2000'],
            'is_featured' => ['required'],
            'status' => ['required'],
            'name' => ['required', 'max:200', Rule::unique(Brand::class, 'slug')->ignore(Str::slug($this->input('name')), 'slug')]
        ];
    }
}
