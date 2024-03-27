<?php

namespace App\Http\Requests\Backend;

use App\Models\Contract;
use Illuminate\Foundation\Http\FormRequest;


class ContractRequest extends FormRequest
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
            'code' => ['required'],
            'name' => ['required', 'max:250'],
            'salary' => ['required'],
            'allowance' => ['required'],
            'end_date' => ['required'],
        ];
    }
}
