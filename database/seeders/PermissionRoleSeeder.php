<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    private function createRolePermission(Role $role, $name)
    {
        $permission = Permission::create(['name' => $name]);
        $role->permissions()->attach($permission->id);
        return $permission;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $superAdminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $arrayPermission = [
            'user',
            'brand',
            'category',
            'subcategory',
            'product',
            'slider',
            'coupon',
            'admin.order',
            'featured.product',
        ];
        foreach ($arrayPermission as $per) {
            $perIndex = $this->createRolePermission($superAdminRole, $per . '.index');
            $perAdd = $this->createRolePermission($superAdminRole, $per . '.add');
            $perEdit = $this->createRolePermission($superAdminRole, $per . '.edit');
            $perDel = $this->createRolePermission($superAdminRole, $per . '.delete');
        }

        $this->createRolePermission($superAdminRole, 'admin.dashboard.index');
        $this->createRolePermission($superAdminRole, 'footer.edit');
        $this->createRolePermission($superAdminRole, 'setting.edit');
        $userDashPer=$this->createRolePermission($superAdminRole, 'user.dashboard.index');
        $userRole->permissions()->attach($userDashPer->id);
        $userOrderPer=$this->createRolePermission($superAdminRole, 'user.order.index');
        $userRole->permissions()->attach($userOrderPer->id);
    }
}
