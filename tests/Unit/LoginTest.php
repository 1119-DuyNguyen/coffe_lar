<?php

namespace Tests\Unit;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Catch_;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class LoginTest extends TestCase
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

    function testLoginRequestEmailAndPasswordNotFound()
    {
        $this->expectException(ValidationException::class);

        try {
            $request = new LoginRequest([
                'email' => 'thanhduy191103@gmail.com',
                'password' => '123'
            ]);

            $request->authenticate();
        } catch (ValidationException $exception) {
            $this->assertContains('email', array_keys($exception->errors()));
            $this->assertContains('Thông tin tài khoản không tìm thấy trong hệ thống.',array_values($exception->errors()['email']));

            throw $exception;
        }
    }

    function testLoginRequestAccountNotActive()
    {
        $this->expectException(ValidationException::class);

        try {
            $request = new LoginRequest([
                'email' => 'ban@gmail.com',
                'password' => '123'
            ]);

            $request->authenticate();
        } catch (ValidationException $exception) {
            $this->assertContains('email', array_keys($exception->errors()));
            $this->assertContains('Tài khoản của bạn đã bị khoá', array_values($exception->errors()['email']) );
            throw $exception;
        }
    }

    function testLoginRequestSuccess()
    {
        $request = new LoginRequest([
            'email' => 'user@gmail.com',
            'password' => '123'
        ]);
        assertTrue($request->authenticate());
    }
}
