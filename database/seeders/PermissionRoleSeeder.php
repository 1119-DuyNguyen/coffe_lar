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
            'admin.user',
            'admin.brand',
            'admin.category',
            'admin.subcategory',
            'admin.product',
            'admin.slider',
            'admin.coupon',
            'admin.order',
            'admin.featured-product',
        ];
        foreach ($arrayPermission as $per) {
            $perIndex = $this->createRolePermission($superAdminRole, $per . '.index');
            $perAdd = $this->createRolePermission($superAdminRole, $per . '.add');
            $perShow = $this->createRolePermission($superAdminRole, $per . '.show');
            $perUpdate = $this->createRolePermission($superAdminRole, $per . '.update');
            $perDel = $this->createRolePermission($superAdminRole, $per . '.delete');
        }

        $this->createRolePermission($superAdminRole, 'admin.dashboard.index');
        $this->createRolePermission($superAdminRole, 'footer.edit');
        $this->createRolePermission($superAdminRole, 'setting.edit');
        $arrayUserPermission=['dashboard.index','order.index','order.show'];
        foreach ($arrayUserPermission as $per){
            $perObject=$this->createRolePermission($superAdminRole,'user.'.$per );
            $userRole->permissions()->attach($perObject->id);
        }
    }
}
