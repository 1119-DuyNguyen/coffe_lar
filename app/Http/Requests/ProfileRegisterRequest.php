<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->route()->user ?? "")
            ],
            'phone' => ['nullable', 'numeric', 'regex:/^(0[1-9][0-9]{8}|84[1-9][0-9]{8})$/'],
            'role_id' => ['required', 'exists:roles,id']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'role_id' => $this->input('role_id') ?? 2,
        ]);
    }

}
