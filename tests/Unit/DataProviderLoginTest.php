<?php

namespace Tests\Unit;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\Validator;
use PHPUnit\Framework\Attributes\DataProvider;
// use PHPUnit\Framework\TestCase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class DataProviderLoginTest extends TestCase
{
    #[DataProvider('providerTestValidate')]
    function testLoginRequestValidationFails($data, $typeValidate)
    {
        $this->expectException(ValidationException::class);
        try {
            $request = new LoginRequest($data);

            $request->authenticate();
        } catch (ValidationException $exception) {
            $this->assertContains($typeValidate, array_keys($exception->errors()));
            throw $exception;
        }
    }
    public static function providerTestValidate()
    {
        return [
            [
                [
                    'email' => 'thanhduy191103@gmail.com',
                    'password' => ''
                ], 'password'
            ],
            [
                [
                    'email' => 'not valid email',
                    'password' => '123'
                ], 'email'

            ],
        ];
    }
}
