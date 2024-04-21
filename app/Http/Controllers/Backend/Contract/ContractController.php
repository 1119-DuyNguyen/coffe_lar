<?php

namespace App\Http\Controllers\Backend\Contract;

use App\Http\Controllers\CRUDController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ContractRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\User;

class ContractController extends CRUDController
{
    protected function CRUDViewPath(): string
    {
        return "admin.contracts";
    }

    protected function model(): string
    {
        return Contract::class;;
    }

    // validate
    protected function getFormRequest(): string
    {
        return ContractRequest::class;
    }

    protected function getNameRouteCRU(): string
    {
        return 'admin.contracts';
    }

    protected function getFormElements(): array
    {
        return [
            [
                'type' => 'text',
                'name' => "code",
                'class' => "",
                'label' => "Mã hợp đồng",
            ],
            [
                'type' => 'text',
                'name' => "name",
                'class' => "",
                'label' => "Tên hợp đồng",
            ],
            [
                'type' => 'select',
                'name' => "user_id",
                'value' => function ($resource) {
                    return $resource->user_id;
                },
                'class' => "",
                'label' => "Tên Nhân viên",
                'optionValues' => User::employee()->get()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],
            [
                'type' => 'number',
                'name' => "salary",
                'class' => "",
                'label' => "Mức lương cơ bản",
            ],
            [
                'type' => 'number',
                'name' => "allowance",
                'class' => "",
                'label' => "Phụ cấp",
            ],
            [
                'type' => 'date',
                'name' => "end_date",
                'class' => "",
                'label' => "Ngày kết thúc hợp đồng",
            ],
            [
                'type' => 'select',
                'name' => "role_id",
                'value' => function ($resource) {
                    return $resource->role_id;
                },
                'class' => "",
                'label' => "Chức vụ",
                'optionValues' => Role::all()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],
        ];
    }
}
