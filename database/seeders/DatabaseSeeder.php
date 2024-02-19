<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $tableNames = Schema::getConnection()
            ->getDoctrineSchemaManager()
            ->listTableNames();
        foreach ($tableNames as $name) {
            DB::table($name)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $this->call(PermissionRoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TypeOpinionSeeder::class);
        //        $this->call(AdminProfileSeeder::class);
        //        $this->call(VendorShopProfileSeeder::class);
        //data product
        \DB::unprepared(
            file_get_contents(__DIR__ . '/seeder-product.sql')
        );
        for ($i = 0; $i < 30; ++$i) {
            // cà phê đóng gói
            DB::insert(
                "
            INSERT INTO `products` (`id`, `name`, `slug`, `thumb_image`, `category_id`, `description`, `content`, `price`, `status`, `created_at`, `updated_at`) VALUES
            (" . $i + 61 . ", 'Tri Ân Thầy Cô {$i}', 'tri-an-thay-co-{$i}', 'uploads/products/tri-an-thay-co.jpg', 1, 'Món quà ý nghĩa ngày nhà giáo', '<p>Khi mua trọn bộ &nbsp;<strong>Tri ân Thầy Cô</strong> Quý khách sẽ được<strong>&nbsp;Tặng kèm 1 phin nhôm nâu và 1 túi giấy đen</strong><br>
            Thời gian khuyến mãi: từ hôm nay đến 30/11/2023 ( hoặc đến khi hết quà tặng).<br>
            </p>
              ', 337000, 1, NULL, '2023-09-23 17:52:28')"
            );
            // bộ quà tặng
            DB::insert(
                "
            INSERT INTO `products` (`id`, `name`, `slug`, `thumb_image`, `category_id`, `description`, `content`, `price`, `status`, `created_at`, `updated_at`) VALUES
            (" . $i + 1 . ", 'Bộ Quà Tặng Trung Nguyên Legend {$i}', 'bo-qua-tang-trung-nguyen-legend-{$i}', 'uploads/products/Hop-Qua-ABCD.jpg', 2, 'Món quà ý nghĩa ngày nhà giáo', '

            Từ nơi Đại ngàn Tây Nguyên hùng vĩ – “Vùng đất đỏ bazan huyền thoại, có lịch sử hình thành hơn 160 triệu năm trước”. Câu chuyện Cà phê Chồn bắt đầu với loại chồn hương hoang dã, sống trong những cánh rừng cà phê bạt ngàn… Những “nghệ nhân” này sau khi ăn những trái cà phê chín mọng đã cho ra đời loại cà phê nguyên liệu độc nhất để tạo nên Cà phê WEASEL “vô cùng quý hiếm và đắt nhất thế giới” đến từ Trung Nguyên, với sản lượng hết sức khiêm tốn, chỉ khoảng 40 – 50kg mỗi năm.

            Học ở thiên nhiên. Các chuyên gia Trung Nguyên đã dày công nghiên cứu tìm tòi và bằng phương pháp “Lên men sinh học” đã tái tạo thành công quy trình ấp ủ cà phê thật sự diễn ra trong cơ thể Chồn Hương hoang dã nhằm tạo nên loại cà phê nguyên liệu đặc biệt cho sự ra đời của “Tuyệt Phẩm Cà Phê LEGEND”.
              ', 337000, 1, NULL, '2023-09-23 17:52:28')"
            );
            // vật phẩm bán lẻ
            DB::insert(
                "
            INSERT INTO `products` (`id`, `name`, `slug`, `thumb_image`, `category_id`, `description`, `content`, `price`, `status`, `created_at`, `updated_at`) VALUES
            (" . $i + 31 . ", 'Phin Nhôm Vĩ Nhân {$i}', 'phin-nhom-vi-nhan-{$i}', 'uploads/products/phin-nhom-vi-nhan.png', 3, 'Món quà ý nghĩa ngày nhà giáo', '<p>Thể tích đạt tiêu chuẩn của phin khoảng 170ml.</p>
            <p>Chất liệu nhôm thích hợp nhất cho một chiếc phin lọc cà phê.</p>', 337000, 1, NULL, '2023-09-23 17:52:28')"
            );
        }
        $file_path = [
            __DIR__ . '/seeder.sql',
            __DIR__ . '/seeder-order.sql',
        ];
        foreach ($file_path as $file) {
            \DB::unprepared(
                file_get_contents($file)
            );
        }


        //         data all
        //        $this->call(ProductVariantSeeder::class);

    }
}
