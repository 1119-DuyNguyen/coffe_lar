<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
            {
                [
                    'name' => ['required','string', 'max:255'],
                    'email' => ['required','email', 'max:255', Rule::unique(User::class)->ignore($this->route()->user ?? "")],
                    'phone' => ['nullable', 'numeric', 'regex:/^(0[1-9][0-9]{8}|84[1-9][0-9]{8})$/'],
//                    'address' => ['nullable', 'string', 'max:255'],
                    'password' => ['required', 'confirmed', Password::defaults()],
                    'role_id' => ['required', 'exists:roles,id']
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => ['required','string', 'max:255'],
                    'email' => ['required','email', 'max:255', Rule::unique(User::class)->ignore($this->route()->user ?? "")],
                    'phone' => ['sometimes','nullable', 'numeric', 'regex:/^(0[1-9][0-9]{8}|84[1-9][0-9]{8})$/'],
//                    'address' => ['sometimes','nullable', 'string', 'max:255'],
                    'password' => ['sometimes','nullable', 'confirmed', Password::defaults()],
                    'role_id' => ['required', 'exists:roles,id']
                ];
            }
            default:
                return [];

        }
    }

    public function prepareForValidation()
    {
        $this->merge([
            'role_id' => $this->input('role_id') ?? 2,
        ]);
    }

}
