<?php

namespace App\Http\Controllers\Backend\Checkin;

use App\Http\Controllers\CRUDController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CheckinRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Checkin;
use App\Models\User;

class CheckinController extends CRUDController
{
    protected function CRUDViewPath(): string
    {
        return "admin.checkins";
    }

    protected function model(): string
    {
        return Checkin::class;;
    }

    // validate
    protected function getFormRequest(): string
    {
        return CheckinRequest::class;
    }

    protected function getNameRouteCRU(): string
    {
        return 'admin.checkins';
    }

    protected function getFormElements(): array
    {
        return [
            //            [
            //                'type' => 'select',
            //                'name' => "contract_id",
            //                'value' => function ($resource) {
            //                    return $resource->contract_id;
            //                },
            //                'class' => "",
            //                'label' => "Hợp đồng",
            //                'optionValues' => Contract::all()->toArray(),
            //                'optionKey' => 'id',
            //                'optionLabel' => 'name'
            //            ],
            [
                'type' => 'select',
                'name' => "contract_id",
                // 'value' => function ($resource) {
                //     dd($resource->latestContract);
                //     return $resource->latestContract->id ?? "";
                // },
                'class' => "",
                'label' => "Hợp đồng",
                'optionValues' => Contract::all()->map(function ($contract) {
                    return [
                        'id' => $contract->id,
                        'name' => $contract->user->name,
                    ];
                })->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],
            [
                'type' => 'month',
                'name' => "date",
                'class' => "",
                'label' => "Tháng chấm công",
            ],
            [
                'type' => 'number',
                'name' => "unauth_day_off",
                'class' => "",
                'label' => "Tổng số ngày nghỉ",
            ],
            //            [
            //                'type' => 'number',
            //                'name' => "unauth_day_off",
            //                'class' => "",
            //                'label' => "Ngày nghỉ không phép",
            //            ],
            [
                'type' => 'number',
                'name' => "over_times",
                'class' => "",
                'label' => "Số giờ tăng ca",
            ],

        ];
    }
}
