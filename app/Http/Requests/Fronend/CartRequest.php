<?php

namespace App\Http\Requests\Fronend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'variants_items'=>['array'],
            'qty' => ['required', 'integer','min:1'],
            //
        ];
    }
    public function messages()
    {
        return [
            'qty.required'=> "Bạn cần nhập số lượng và phải là số",
            'qty.min'=> "Số lượng sản phẩm phải lớn hơn 0",
            'qty.integer'=>"Số lượng phải là số"
        ]; // TODO: Change the autogenerated stub
    }

}
