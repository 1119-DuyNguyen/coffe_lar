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
        DB::table('users')->insert([
            [
                'name' => 'Người dùng tối cao',
                // 'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role_id' => 1,
                'password' => bcrypt('123')
            ],
            //            [
            //                'name' => 'Vendor user',
            //                'username' => 'vendor',
            //                'email' => 'vendor@gmail.com',
            //                'role_id' => 2,
            //                'password' => bcrypt('123')
            //            ],
            [
                'name' => 'Người dùng',
                // 'username' => 'user',
                'email' => 'user@gmail.com',
                'role_id' => 2,
                'password' => bcrypt('123')
            ],
        ]);
        User::create([
            'name' => 'Tài khoản bị khoá',
            // 'username' => 'ban',
            'email' => 'ban@gmail.com',
            'role_id' => 2,
            'password' => bcrypt('123'),
            'status' => 0
        ]);
    }
}
