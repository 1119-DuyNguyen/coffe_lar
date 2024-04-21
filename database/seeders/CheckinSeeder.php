<?php

namespace Database\Seeders;

use App\Models\Checkin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CheckinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedData = [
            [
                'contract_id' => 1,
                'date' => "2024-02",
                'auth_day_off' => 0,
                'unauth_day_off' => 0,
                'reality_times' => 26,
                'over_times' => 0,
                'salary' => 500000,
                'total_salary' => 13000000,
            ],
            [
                'contract_id' => 2,
                'date' => "2024-02",
                'auth_day_off' => 0,
                'unauth_day_off' => 0,
                'reality_times' => 26,
                'over_times' => 0,
                'salary' => 500000,
                'total_salary' => 13000000,
            ],
            [
                'contract_id' => 1,
                'date' => "2024-03",
                'auth_day_off' => 0,
                'unauth_day_off' => 1,
                'reality_times' => 25,
                'over_times' => 0,
                'salary' => 500000,
                'total_salary' => 12500000,
            ],
        ];
        foreach ($seedData as $data) {
            Checkin::create($data);
        }
    }
}
