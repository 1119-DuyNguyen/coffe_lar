<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends CRUDController
{

    protected function model(): string
    {
        return Role::class;
    }

    protected function getFormRequest(): string
    {
        return RoleRequest::class;
    }

    protected function CRUDViewPath(): string
    {
        return "admin.roles";
    }

    protected function getNameRouteCRU(): string
    {
        return "admin.roles";
    }

    protected function getFormElements(): array
    {
        return [
            [
                'type' => 'text',
                'name' => "name",
                'class' => "",
                'label' => "Tên chức vụ",
            ],
            [
                'type' => 'textfield',
                'name' => "description",
                'class' => "",
                'label' => "Mô tả",
            ],
            [
                'type' => 'checkbox',
                'name' => "permissions",
                'value' => function ($role) {
                    return DB::table('permission_role')->where('role_id', $role->id)->pluck('permission_id')->toArray();
                },
                'class' => "",
                'label' => "Quyền",
                'optionValues' => Permission::all()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'description'
            ],
        ];
    }


}
