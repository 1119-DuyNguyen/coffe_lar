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
                'name' => 'Nghỉ việc',
            ],
            [
                'name' => 'Xin nghỉ phép',
            ],
            [
                'name' => 'Nghỉ ốm đau thai sản',
            ],
        ];
        foreach ($seedData as $data) {
            TypeOpinion::create($data);
        }
    }
}
