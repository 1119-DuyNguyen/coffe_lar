<?php

namespace App\Http\Controllers\Backend\Opinion;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\TypeOpinionRequest;
use App\Models\TypeOpinion;
use Illuminate\Http\Request;

class TypeOpinionController extends CRUDController
{

    protected function CRUDViewPath(): string
    {
        return "admin.type-opinions";
    }

    protected function model(): string
    {
        return TypeOpinion::class;;
    }

    // validate
    protected function getFormRequest(): string
    {
        return TypeOpinionRequest::class;
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
                'label' => "Loại ý kiến",
            ],
        ];
    }
}
