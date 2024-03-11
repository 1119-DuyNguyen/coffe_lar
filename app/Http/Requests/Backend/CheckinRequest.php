<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CheckinRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'contract_id' => ['required'],
            'date' => ['required'],
            'reality_time' => ['required'],
            'over_time' => ['required'],
            'salary' => ['required'],
            'total_salary' => ['required'],
        ];
    }
}
