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
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $userRole = Role::create(['name' => 'User']);

        $arrayPermission = [
            'admin.user',
            'admin.brand',
            'admin.category',
            'admin.sub-category',
            'admin.child-category',
            'admin.product',
            'admin.slider',
            'admin.coupon',
            'admin.order',
            'admin.featured-product',
            'admin.role',
            'admin.footer-info',
            'admin.footer-socials'
            ,
            'admin.footer-grid-two',
            'admin.footer-grid-three',

        ];
        foreach ($arrayPermission as $per) {
            $perIndex = $this->createRolePermission($superAdminRole, $per . '.index');
            $perStore = $this->createRolePermission($superAdminRole, $per . '.store');
            $perShow = $this->createRolePermission($superAdminRole, $per . '.show');
            $perUpdate = $this->createRolePermission($superAdminRole, $per . '.update');
            $perDel = $this->createRolePermission($superAdminRole, $per . '.destroy');
        }
        $this->createRolePermission($superAdminRole, 'admin.setting.index');
        $this->createRolePermission($superAdminRole, 'admin.general-setting.update');
        $this->createRolePermission($superAdminRole, 'admin.logo-setting.update');
        $this->createRolePermission($superAdminRole, 'admin.dashboard.index');
        $this->createRolePermission($superAdminRole, 'setting.edit');
        $arrayUserPermission=['dashboard.index','order.index','order.show','cod.payment'];
        foreach ($arrayUserPermission as $per){
            $perObject=$this->createRolePermission($superAdminRole,'user.'.$per );
            $userRole->permissions()->attach($perObject->id);
        }
    }
}
