<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedData = [
            [
                'code' => '10-HDLD-ABC',
                'name' => 'Hợp đồng xác định thời hạn',
                'user_id' => '4',
                'salary' => '123123',
                'allowance' => '250000',
                'end_date' => Carbon::parse('29-2-2024'),
                'status' => 1,
            ],
            [
                'code' => '10-HDLD-BCD',
                'name' => 'Hợp đồng xác định thời hạn',
                'user_id' => '5',
                'salary' => '123123',
                'allowance' => '250000',
                'end_date' => Carbon::parse('10-07-2024'),
                'status' => 0,
            ],
        ];
        foreach ($seedData as $data) {
            Contract::create($data);
        }
    }
}
