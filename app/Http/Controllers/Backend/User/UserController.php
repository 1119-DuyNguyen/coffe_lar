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
        // TODO: Implement CRUDViewPath() method.
    }

    protected function getNameRouteCRU(): string
    {
        return "admin.users";
        // TODO: Implement getNameRouteCRU() method.
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
//            [
//                'type' => 'text',
//                'name' => "phone",
//                'class' => "",
//                'label' => "Số điện thoại",
//            ],
            [
                'type' => 'select',
                'name' => "role_id",
                'value' => function ($resource) {
                    return $resource->role_id;
                },
                'class' => "",
                'label' => "Vai trò",
                'optionValues' => Role::all()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],

        ];
        // TODO: Implement getFormElements() method.
    }
}
