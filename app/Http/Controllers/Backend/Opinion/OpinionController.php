<?php

namespace App\Http\Controllers\Backend\Opinion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\OpinionRequest;
use App\Models\Opinion;
use App\Enums\OpinionStatus;
use App\Models\TypeOpinion;
use App\Models\User;
use Illuminate\Http\Request;


class OpinionController extends CRUDController
{

    protected function CRUDViewPath(): string
    {
        return "admin.opinions";
    }

    protected function model(): string
    {
        return Opinion::class;;
    }

    // validate
    protected function getFormRequest(): string
    {
        return OpinionRequest::class;
    }

    protected function getNameRouteCRU(): string
    {
        return 'admin.opinions';
    }

    protected function getFormElements(): array
    {
        return [
            [
                'type' => 'select',
                'name' => "type_opinion_id",
                'value' => function ($resource) {
                    return $resource->type_opinion_id;
                },
                'class' => "",
                'label' => "Loại ý kiến",
                'optionValues' => TypeOpinion::all()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],
            [
                'type' => 'select',
                'name' => "user_id",
                'value' => function ($resource) {
                    return $resource->user_id;
                },
                'class' => "",
                'label' => "Nhân viên",
                'optionValues' => User::all()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],
            [
                'type' => 'text',
                'name' => "topic",
                'class' => "",
                'label' => "Chủ đề",
            ],
            [
                'type' => 'text',
                'name' => "content",
                'class' => "",
                'label' => "Nội dung",
            ],
            [
                'type' => 'text',
                'name' => "content",
                'class' => "",
                'label' => "Nội dung",
            ],
        ];
    }
    public function changeOpinionStatus(Request $request)
    {
        $opinion = Opinion::findOrFail($request->input('id'));
        if ($opinion->opinion_status == OpinionStatus::rejected || $opinion->opinion_status == OpinionStatus::accepted) {
            return response(['status' => 'error', 'message' => 'Không được phép thay đổi trạng thái đơn hàng']);
        }

        $opinion->opinion_status = $request->input('status');
        $opinion->save();

        return response(['status' => 'success', 'message' => 'Cập nhập trạng thái thành công']);
    }
}
