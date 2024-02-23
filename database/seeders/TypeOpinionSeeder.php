<?php

namespace Database\Seeders;

use App\Models\TypeOpinion;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TypeOpinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedData = [
            [
                'name' => 'Đề xuất tăng ca',
            ],
            [
                'name' => 'Xin phép nghỉ việc',
            ],
            [
                'name' => 'Đề xuất kỉ luật',
            ],
        ];
        foreach ($seedData as $data) {
            TypeOpinion::create($data);
        }
    }
}
