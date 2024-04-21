<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
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
                'code' => '10-HDLD-QTHT',
                'name' => 'Hợp đồng quản trị hệ thống ',
                'user_id' => 1,
                'salary' => '500000',
                'allowance' => '250000',
                'end_date' => Carbon::parse('10-07-2030'),
                'status' => 0,
                'role_id' => RoleEnum::SUPER_ADMIN
            ],
            [
                'code' => '10-HDLD-QLK',
                'name' => 'Hợp đồng quản lý kho Có thời hạn',
                'user_id' => 4,
                'salary' => '500000',
                'allowance' => '250000',
                'end_date' => Carbon::parse('29-2-2024'),
                'status' => 1,
                'role_id' => RoleEnum::WARE_HOUSE_MANAGER
            ],
            [
                'code' => '10-HDLD-QLBH',
                'name' => 'Hợp đồng quản lý bán hàng Có thời hạn ',
                'user_id' => 5,
                'salary' => '500000',
                'allowance' => '250000',
                'end_date' => Carbon::parse('10-07-2024'),
                'status' => 0,
                'role_id' => RoleEnum::SELLER

            ],
            [
                'code' => '10-HDLD-QLNS',
                'name' => 'Hợp đồng quản lý nhân sự có thời hạn ',
                'user_id' => 6,
                'salary' => '500000',
                'allowance' => '250000',
                'end_date' => Carbon::parse('10-07-2024'),
                'status' => 0,
                'role_id' => RoleEnum::HUMAN_RESOURCE
            ],
        ];
        foreach ($seedData as $data) {
            Contract::create($data);
        }
    }
}
