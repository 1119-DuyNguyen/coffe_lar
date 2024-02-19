<?php

namespace App\Http\Controllers\Backend\Opinion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\OpinionRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TypeOpinionController extends CRUDController
{

    protected function CRUDViewPath(): string
    {
        return "admin.type-opinions";
    }

    protected function model(): string
    {
        return User::class;;
    }

    // validate
    protected function getFormRequest(): string
    {
        return OpinionRequest::class;
    }

    protected function getNameRouteCRU(): string
    {
        return 'admin.type-opinions';
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
