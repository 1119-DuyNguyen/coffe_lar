<?php

namespace App\Http\Requests\Backend;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'thumb_image' => ['required'],
            'name' => [
                'required',
                'max:200',
                Rule::unique(Product::class, 'slug')->ignore(Str::slug($this->input('name')), 'slug')
            ],
            'category_id' => ['required', 'exists:categories,id'],
            'price' => ['required', 'integer', 'min:1'],
            'weight' => ['required', 'integer', 'min:1'],
            //            'qty' => ['required'],
            'description' => ['required', 'max: 600'],
            'content' => ['required'],
            // 'status' => ['required']
        ];
    }
}
