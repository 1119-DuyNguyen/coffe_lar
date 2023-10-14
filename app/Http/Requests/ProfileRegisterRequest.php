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
        if(!$this->has('role'))
        {
            $this->merge(['role'=>2]);
        }
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'numeric','regex:/^(0[1-9][0-9]{8}|84[1-9][0-9]{8})$/'],
            'address' => ['required','string', 'max:255'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role_id'=> ['required','exists:roles,id']
        ];

    }
    public function prepareForValidation()
    {
        $this->merge([
            'role_id' => $this->input('role_id') ?? 2,
        ]);
    }

}
