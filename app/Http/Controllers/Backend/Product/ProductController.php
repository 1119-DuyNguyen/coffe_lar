<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Category;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Role;
use App\Traits\CrudTrait;


class ProductController extends CRUDController
{

    protected function model(): string
    {
        return Product::class;
    }

    protected function getFormRequest(): string
    {
        return ProductRequest::class;
    }

    protected function getImageInput(): string|null
    {
        return 'thumb_image';
    }

    protected function getImagePath(): string|null
    {
        return 'products';
    }

    protected function getInputSlug(): string
    {
        return 'name';
    }


    protected function CRUDViewPath(): string
    {
        return "admin.products";
    }

    protected function getNameRouteCRU(): string
    {
        return "admin.products";
    }

    protected function getFormElements(): array
    {
        return [

            [
                'type' => 'text',
                'name' => "name",
                'class' => "",
                'label' => "Tên sản phẩm",
            ],
            [
                'type' => 'file',
                'name' => "thumb_image",
                'class' => "",
                'label' => "Chọn ảnh",
            ],
            [
                'type' => 'select',
                'name' => "category_id",
                'value' => function ($resource) {
                    return $resource->category;
                },
                'class' => "",
                'label' => "Danh mục",
                'optionValues' => Category::all()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],
            [
                'type' => 'text',
                'name' => "description",
                'class' => "",
                'label' => "Mô tả sản phẩm",
            ],
            [
                'type' => 'text',
                'name' => "content",
                'class' => "",
                'label' => "Nội dung sản phẩm",
            ],
            [
                'type' => 'number',
                'name' => "price",
                'class' => "",
                'label' => "Giá sản phẩm",
            ],
            [
                'type' => 'number',
                'name' => "weight",
                'class' => "",
                'label' => "Khối lượng",
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
