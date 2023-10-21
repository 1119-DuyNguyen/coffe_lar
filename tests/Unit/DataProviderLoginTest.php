<?php

namespace Tests\Unit;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\Validator;
use PHPUnit\Framework\TestCase;

class DataProviderLoginTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /** @var \App\Http\Requests\Auth\LoginRequest */
    private $rules;

    /** @var \Illuminate\Validation\Validator */
    private $validator;

//    public function setUp(): void
//    {
//        parent::setUp();
//
//        $this->validator = app()->get(Validator::class);
//
//        $this->rules = (new LoginRequest())->rules();
//    }

    public function validationProvider()
    {
        return [
            'test_fails_when_password_not_valid' => [
                'passed' => false,
                'data' => [
                    'email'=> 'email@gmail.com',
                    'password' => ''
                ]
            ],
            'test_fails_when_email_not_valid' => [
                'passed' => false,
                'data' => [
                    'email' => 'not valid email',
                    'password'=>'123'
                ]
            ],
//            'test_fails_when_email_and_password_not_match_database' => [
//                'passed' => false,
//                'data' => [
//                    'email' => 'unknow@gmail.com',
//                    'password'=>'unknow'
//                ]
//            ],
//            'test_fails_when_user_is_not_active' => [
//                'passed' => false,
//                'data' => [
//                    'email' => 'userban@gmail.com',
//                    'password'=>'123'
//                ]
//            ],
//            'test_success_when_user_log_in' => [
//                'passed' => true,
//                'data' => [
//                    'email' => 'user@gmail.com',
//                    'password'=>'123'
//                ]
//            ]
        ];
    }

//    /**
//     * @test
//     * @dataProvider validationProvider
//     * @param array $mockedRequestData
//     */
//    public function validation_results_as_expected( $mockedRequestData)
//    {
//        $this->assertEquals(
//
//            $this->validate($mockedRequestData)
//        );
//    }
//
//    protected function validate($mockedRequestData)
//    {
//        return $this->validator
//            ->make($mockedRequestData, $this->rules)
//            ->passes();
//    }
}
