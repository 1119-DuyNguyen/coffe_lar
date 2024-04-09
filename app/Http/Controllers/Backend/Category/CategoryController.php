<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;


class CategoryController extends CRUDController
{
    protected function model(): string
    {
        return Category::class;
    }

    protected function getFormRequest(): string
    {
        return CategoryRequest::class;
    }

    protected function getInputSlug(): string
    {
        return 'name';
    }

    protected function CRUDViewPath(): string
    {
        return "admin.categories";
        // TODO: Implement CRUDViewPath() method.
    }

    protected function getNameRouteCRU(): string
    {
        return "admin.categories";
        // TODO: Implement getNameRouteCRU() method.
    }

    protected function getFormElements(): array
    {
        return [
            [
                'type' => 'text',
                'name' => "name",
                'class' => "",
                'label' => "Tên danh mục",
            ],
            [
                'type' => 'status',
                'name' => "price",
                'class' => "",
                'label' => "Trạng thái",
            ],

        ];
    }
}
