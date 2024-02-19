<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\App\Models;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\StaffRequest;
use App\Models\Role;
use App\Models\User;

class EmployeeController extends CRUDController
{
    protected function CRUDViewPath(): string
    {
        return "admin.employees";
    }

    protected function model(): string
    {
        return User::class;
    }

    protected function getFormRequest(): string
    {
        return StaffRequest::class;
    }

    protected function getNameRouteCRU(): string
    {
        return 'admin.employees';
    }

    protected function getFormElements(): array
    {
        return [
            [
                'type' => 'text',
                'name' => "name",
                'class' => "",
                'label' => "Họ tên",
            ],
            [
                'type' => 'text',
                'name' => "email",
                'class' => "",
                'label' => "Email",
            ],
            [
                'type' => 'text',
                'name' => "phone",
                'class' => "",
                'label' => "Số điện thoại",
            ],
            [
                'type' => 'text',
                'name' => "address",
                'class' => "",
                'label' => "Địa chỉ liên hệ",
            ],
            [
                'type' => 'select',
                'name' => "role",
                'fieldResource' => 'role_id',
                'class' => "",
                'label' => "Chức vụ",
                'optionValues' => Role::employee()->get()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],


        ];
    }


}
