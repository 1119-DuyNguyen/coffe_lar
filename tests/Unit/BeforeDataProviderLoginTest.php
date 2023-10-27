<?php

namespace Tests\Unit;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\Validator;
use PHPUnit\Framework\Attributes\DataProvider;
// use PHPUnit\Framework\TestCase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class BeforeDataProviderLoginTest extends TestCase
{
    function testLoginRequestPasswordValidationFails()
    {
        $this->expectException(ValidationException::class);
        try {
            $request = new LoginRequest([
                'email' => 'thanhduy191103@gmail.com',
                'password' => ''
            ]);

            $request->authenticate();
        } catch (ValidationException $exception) {
            $this->assertContains('password', array_keys($exception->errors()));
            throw $exception;
        }
    }

    function testLoginRequestEmailValidationFails()
    {
        $this->expectException(ValidationException::class);
        try {
            $request = new LoginRequest([
                'email' => 'not valid email',
                'password' => '123'
            ]);

            $request->authenticate();
        } catch (ValidationException $exception) {
            $this->assertContains('email', array_keys($exception->errors()));
            throw $exception;
        }
    }
}
