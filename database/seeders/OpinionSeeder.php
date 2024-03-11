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
                'type_opinion_id' => '2',
                'topic' => 'Xin phép',
                'content' => 'Xin phép hội đồng cho phép tôi được tạm dừng làm việc tại cơ sở vì lí do gia dình',
            ],
            [
                'user_id' => 7,
                'type_opinion_id' => '1',
                'topic' => 'Đề xuât ',
                'content' => 'Tôi xin phép được đề xuất anh Nguyễn Văn A đảm nhiệm vị trí quản lí dự án của nhóm',
            ],
        ];
        foreach ($seedData as $data) {
            Opinion::create($data);
        }
    }
}
