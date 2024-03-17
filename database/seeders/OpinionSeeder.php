<?php

namespace Database\Seeders;

use App\Models\Opinion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OpinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedData = [
            [
                'user_id' => 5,
                'type_opinion_id' => '1',
                'topic' => 'Xin phép nghỉ việc',
                'content' => 'Xin phép hội đồng cho phép tôi được tạm dừng làm việc tại cơ sở vì lí do gia dình',
            ],
            [
                'user_id' => 7,
                'type_opinion_id' => '2',
                'topic' => 'Xin nghỉ phép',
                'content' => 'Tôi xin phép được nghỉ một hôm vì có công việc cá nhân cần giải quyết',
            ],
        ];
        foreach ($seedData as $data) {
            Opinion::create($data);
        }
    }
}
