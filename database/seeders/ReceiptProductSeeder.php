<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceiptProductSeeder extends Seeder
{
    private function createReceiptProduct(Receipt $receipt, $per)
    {
        $receipt->products()->attach($per);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $seedData = [
//            [
//                'name' => 'hayem e332',
//                'provider_name' => 'hay em oi',
//
//            ],
//            [
//                'name' => 'hayem4444',
//                'provider_name' => 'hay em oi444444',
//            ],
//
//        ];

        //////tu day
        $seedDataPhieuNhap = Receipt::create(['name' => 'PhieuNhap1', 'provider_name' => 'vĩnh hão']);
        $productIds = Product::pluck('id');
        foreach ($productIds as $per) {
            $this->createReceiptProduct($seedDataPhieuNhap, $per);

//            $perIndex = $this->createRolePermission($superAdminRole, $per . '.index');
//            $perStore = $this->createRolePermission($superAdminRole, $per . '.store');
//            $perShow = $this->createRolePermission($superAdminRole, $per . '.show');
//            $perUpdate = $this->createRolePermission($superAdminRole, $per . '.update');
//            $perDel = $this->createRolePermission($superAdminRole, $per . '.destroy');
        }
        //den day

//        $this->createRolePermission($superAdminRole, 'admin.setting.index');
//        $this->createRolePermission($superAdminRole, 'admin.general-setting.update');
//        $this->createRolePermission($superAdminRole, 'admin.logo-setting.update');
//        $this->createRolePermission($superAdminRole, 'admin.dashboard.index');
//        $arrayUserPermission=['dashboard.index','order.index','order.show','cod.payment'];
//        foreach ($arrayUserPermission as $per){
//            $perObject=$this->createRolePermission($superAdminRole,'user.'.$per );
//            $userRole->permissions()->attach($perObject->id);
//        }
    }
}
