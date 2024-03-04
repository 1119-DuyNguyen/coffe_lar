<?php

namespace App\Http\Controllers\Backend\Opinion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\OpinionRequest;
use App\Models\Opinion;
use App\Models\TypeOpinion;

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
        ];
    }
}
