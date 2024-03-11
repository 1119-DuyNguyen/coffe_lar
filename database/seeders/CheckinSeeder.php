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
                'date' => Carbon::parse('29-2-2024'),
                'reality_times' => 26,
                'over_times' => 0,
                'salary' =>  13000000,
                'total_salary' => 12250000,
            ],
            [
                'contract_id' => 2,
                'date' => Carbon::parse('29-2-2024'),
                'reality_times' => 26,
                'over_times' => 0,
                'salary' =>  12000000,
                'total_salary' => 12250000,
            ],
            [
                'contract_id' => 1,
                'date' => Carbon::parse('29-3-2024'),
                'reality_times' => 25,
                'over_times' => 0,
                'salary' =>  13000000,
                'total_salary' => 12500000,
            ],
        ];
        foreach ($seedData as $data) {
            Checkin::create($data);
        }
    }
}
