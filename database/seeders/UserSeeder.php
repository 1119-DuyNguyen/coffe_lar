<?php

namespace Database\Seeders;

use App\Models\User;
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
                'role_id' => 1,
                'employee_code' => "AD01",
                'password' => bcrypt('123'),
                'status' => 1
            ],
            [
                'name' => 'Tài khoản bị khoá',
                'email' => 'ban@gmail.com',
                'role_id' => 2,
                'password' => bcrypt('123'),
                'status' => 0
            ], [
                'name' => 'Người dùng',
                // 'username' => 'user',
                'email' => 'user@gmail.com',
                'role_id' => 2,
                'password' => bcrypt('123'),
                'status' => 1]
        ];
        foreach ($seedData as $data) User::create($data);
        // create employee
        for ($i = 1; $i <= 50; ++$i) {
            $data = [
                'name' => 'Nhân viên '.$i,
                'email' => 'employee'.$i.'@gmail.com',
                'role_id' => 3,
                'employee_code' => "EMP".str_pad($i,6,"0",STR_PAD_LEFT),
                'password' => bcrypt('123'),
                'status' => 1
            ];
            User::create($data);
        }

    }
}
