<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\CRUDController;
use App\Http\Requests\ProfileRegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends CRUDController
{

    protected function unsetUpdateEmptyField(): array
    {
        return ['password'];
    }

    protected function model(): string
    {
        return User::class;
    }


    protected function getFormRequest(): string
    {
        return ProfileRegisterRequest::class;
    }

    protected function CRUDViewPath(): string
    {
        return "admin.users";
    }

    protected function getNameRouteCRU(): string
    {
        return "admin.users";
    }

    protected function getFormElements(): array
    {
        return [
            [
                'type' => 'text',
                'name' => "name",
                'class' => "",
                'label' => "Tên người dùng",
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

        ];
    }
}
