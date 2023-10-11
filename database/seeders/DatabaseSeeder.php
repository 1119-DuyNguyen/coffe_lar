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
//        $this->call(AdminProfileSeeder::class);
//        $this->call(VendorShopProfileSeeder::class);
        //data product

        $file_path = [
            __DIR__.'/seeder-product.sql',
            __DIR__.'/seeder.sql',
            __DIR__.'/seeder-order.sql',
            ];
        foreach ($file_path as $file)
        {
            \DB::unprepared(
                file_get_contents($file)
            );
        }

//         data all
        $this->call(ProductVariantSeeder::class);

    }
}
