<?php

namespace Database\Seeders;

use App\Models\User;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedData = [
            [
                'name' => 'Người dùng tối cao',
                'email' => 'admin@gmail.com',
                'employee_code' => "AD01",
                'password' => bcrypt('123'),
                'status' => 1,
                'phone' => '0906549331',
                'address' => '273 An Dương Vương, Quận 5, TP HCM',
                'day_of_birth' => DateTime::createFromFormat('d/m/Y', '8/12/2006'),
                'gender' => 1,
                'tax_code' => '8469212338',
                'bank_number' => 430732827131
            ],
            [
                'name' => 'Tài khoản bị khoá',
                'email' => 'ban@gmail.com',
                'password' => bcrypt('123'),
                'status' => 0,
                'phone' => '0905539332',
                'address' => '273 An Dương Vương, Quận 5, TP HCM',
                'day_of_birth' => DateTime::createFromFormat('d/m/Y', '4/7/2011'),
                'gender' => 0,
                'tax_code' => '8469212339',
                'bank_number' => 430833827131
            ],
            [
                'name' => 'Người dùng',
                // 'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123'),
                'status' => 1,
                'phone' => '0999949343',
                'address' => '273 An Dương Vương, Quận 5, TP HCM',
                'day_of_birth' => DateTime::createFromFormat('d/m/Y', '10/12/2006'),
                'gender' => 0,
                'tax_code' => '8469212337',
                'bank_number' => 430513223135
            ]
        ];
        foreach ($seedData as $data) {
            User::create($data);
        }
        // create employee
        for ($i = 1; $i <= 50; ++$i) {
            $data = [
                'name' => 'Nhân viên ' . $i,
                'email' => 'employee' . $i . '@gmail.com',
                'employee_code' => "EMP" . str_pad($i, 6, "0", STR_PAD_LEFT),
                'password' => bcrypt('123'),
                'status' => 1,
                'phone' => '0829131393',
                'address' => '273 An Dương Vương, Quận 5, TP HCM',
                'day_of_birth' => DateTime::createFromFormat('d/m/Y', '10/12/2006'),
                'gender' => 0,
                'tax_code' => '8469212337',
                'bank_number' => 430513123131
            ];
            User::create($data);
        }
    }
}
