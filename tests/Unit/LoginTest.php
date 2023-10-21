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
    /**
     * Set up operations
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    function testLoginRequestPasswordValidationFails()
    {
        $request = new LoginRequest();
        $validator = Validator::make([
            'email' => 'thanhduy191103@gmail.com',
            'password' => ''
        ], $request->rules());

        //Kiểm tra xem thông tin có hợp lệ
        $this->assertFalse($validator->passes());
        //Kiểm tra xem lỗi có khởi tạo
        $this->assertContains('password', $validator->errors()->keys());
    }

    function testLoginRequestEmailValidationFails()
    {
        $request = new LoginRequest();
        $validator = Validator::make([
            'email' => 'not valid email',
            'password' => '123'
        ], $request->rules());

        //Kiểm tra xem thông tin có hợp lệ
        $this->assertFalse($validator->passes());

        //Kiểm tra xem lỗi có khởi tạo
        $this->assertContains('email', $validator->errors()->keys());
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
            //Kiểm tra xem có trả về đúng tin nhắn
            $this->assertContains(trans('auth.failed'),array_values($exception->errors()['email']));

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
            //Kiểm tra xem có trả về đúng tin nhắn
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
