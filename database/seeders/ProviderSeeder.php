<?php

namespace Database\Seeders;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedData = [
            [
                'name' => 'Nhà cung cấp hà nội',
                'description' => 'Nhà cung cấp chăm chỉ',

            ],

        ];
        foreach ($seedData as $data) {
            Provider::create($data);
        }
        // create employee
        for ($i = 1; $i <= 10; ++$i) {
            $data = [
                'name' => 'Nhà cung cấp ' . $i,
                'description' => 'Nhà cung cấp chăm chỉ ' . $i,
            ];
            Provider::create($data);
        }
    }
}
