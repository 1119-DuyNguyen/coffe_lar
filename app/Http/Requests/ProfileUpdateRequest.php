<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->route()->user ??"")],
            'phone' => ['required', 'numeric','regex:/^(0[1-9][0-9]{8}|84[1-9][0-9]{8})$/'],
            'address' => ['required','string', 'max:255'],
            'password' => ['sometimes', 'confirmed', Password::defaults()],
        ];

    }
}
