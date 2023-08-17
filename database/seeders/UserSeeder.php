<?php

namespace Database\Seeders;

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
                'name' => 'Admin user',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role_id' => 1,
                'status' => 'active',
                'password' => bcrypt('123')
            ],
            [
                'name' => 'Vendor user',
                'username' => 'vendor',
                'email' => 'vendor@gmail.com',
                'role_id' => 2,
                'status' => 'active',
                'password' => bcrypt('123')
            ],
            [
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'role_id' =>2,
                'status' => 'active',
                'password' => bcrypt('123')
            ]
        ]);
    }
}
