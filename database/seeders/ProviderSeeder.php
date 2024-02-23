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
                'name' => 'nhà cung cấp hà nội',
                'description' => 'nhà cung cấp chăm chỉ',

            ],

        ];
        foreach ($seedData as $data) {
            Provider::create($data);
        }
        // create employee
        for ($i = 1; $i <= 50; ++$i) {
            $data = [
                'name' => 'Nhân viên ' . $i,
                'description' => 'provider' . $i,
            ];
            Provider::create($data);
        }
    }
}
