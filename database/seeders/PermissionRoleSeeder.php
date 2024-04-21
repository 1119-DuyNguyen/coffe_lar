<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    private function createRolePermission(Role $role, $name, $description)
    {
        $permission = Permission::create(['name' => $name, 'description' => $description]);
        $role->permissions()->attach($permission->id);
        return $permission;
    }

    private function assignPermissionsToRole($permissions, $role)
    {
        $manageWord = "Quản lý";
        foreach ($permissions as $per => $description) {
            if (str_contains(strtolower($description), strtolower($manageWord))) {
                // bỏ chữ quản lý trong tài nguyên
                $description = strtolower(str_replace($manageWord, "", $description));
                $perRead = $this->createRolePermission($role, $per . '.read', 'Xem danh sách' . $description);
                $perStore = $this->createRolePermission($role, $per . '.store', 'Khởi tạo ' . $description);
                $perUpdate = $this->createRolePermission($role, $per . '.update', 'Cập nhập ' . $description);
                $perDel = $this->createRolePermission($role, $per . '.destroy', 'Xóa ' . $description);
            } else {
                $this->createRolePermission($role, $per, $description);
            }
        }
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::create(['name' => 'Tài khoản quyền lực nhất']);
        $sellerRole = Role::create(['name' => 'Nhân viên quản lý bán hàng']);
        $wareHouseManagerRole = Role::create(['name' => 'Quản lý kho']);
        $humanResourceRole = Role::create(['name' => 'Quản lý nhân sự']);

        // quyền quản lý
        $sellerPermission = [
            'admin.dashboard.revenue' => 'Xem thống kê kinh doanh',
            'admin.products' => 'Quản lý sản phẩm',
            'admin.categories' => 'Quản lý danh mục',

        ];
        $this->assignPermissionsToRole($sellerPermission, $sellerRole);

        $stockPermission = [
            'admin.orders.read' => 'Xem danh sách đơn hàng',
            'admin.orders.update' => 'Cập nhập đơn hàng',
            'admin.receipts' => 'Quản lý phiếu nhập',
            
            'admin.dashboard.warehouse' => 'Xem thống kê sản phẩm trong kho',
            'admin.providers' => 'Quản lý nhà cung cấp',

        ];
        $this->assignPermissionsToRole($stockPermission, $wareHouseManagerRole);
        $humanResourcePermission = [

            'admin.employees' => 'Quản lý nhân viên',
//            'admin.type-opinions' => 'Quản lý loại ý kiến',
            'admin.contracts' => 'Quản lý hợp đồng',
            'admin.opinions' => 'Quản lý ý kiến',
            'admin.checkins' => 'Quản lý chấm công',
        ];
        $this->assignPermissionsToRole($humanResourcePermission, $humanResourceRole);

        $onlyAdminPermission = [
            'admin.users' => 'Quản lý người dùng',
            'admin.roles' => 'Quản lý chức vụ',
        ];


        $this->assignPermissionsToRole($humanResourcePermission, $humanResourceRole);


        $this->assignPermissionsToRole(
            array_merge($onlyAdminPermission, $humanResourcePermission, $stockPermission, $sellerPermission),
            $superAdminRole
        );

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
