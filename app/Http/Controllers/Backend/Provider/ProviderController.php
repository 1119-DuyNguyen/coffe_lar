<?php

namespace App\Http\Controllers\Backend\Provider;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\OpinionRequest;
use App\Http\Requests\Backend\ProviderRequest;
use App\Models\Provider;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends CRUDController
{
    /**
     * Display a listing of the resource.
     */
    protected function CRUDViewPath(): string
    {
        return "admin.providers";
    }

    protected function model(): string
    {
        return Provider::class;
    }

    // validate
    protected function getFormRequest(): string
    {
        return ProviderRequest::class;
    }

    protected function getNameRouteCRU(): string
    {
        return 'admin.providers';
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
                'type' => 'textfield',
                'name' => "description",
                'class' => "",
                'optional' => true,
                'label' => "Mô tả",
            ],
        ];
    }
}
