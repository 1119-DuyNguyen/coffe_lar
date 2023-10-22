<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): bool
    {

        $validator =Validator::make($this->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        if(!$validator->passes())   throw new ValidationException($validator);
        if (! Auth::attempt($this->only('email', 'password'), 1)) {
            throw ValidationException::withMessages([
                'email' => 'Thông tin tài khoản không tìm thấy trong hệ thống.',
            ]);
        }
        else{
            $user=Auth::user();

            if (!($user->status || $user->id==1)) {
                Auth::logout();
                Session::flush();
                throw ValidationException::withMessages([
                    'email' => 'Tài khoản của bạn đã bị khoá',
                ]);
            }

        }
        return true;
    }

}
