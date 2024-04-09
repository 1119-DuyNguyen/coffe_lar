<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;
use App\Traits\CrudTrait;


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




    //    public function changeStatus(Request $request)
    //    {
    //        $category = Category::findOrFail($request->id);
    //        $category->status = $request->status == 'true' ? 1 : 0;
    //        $category->save();
    //
    //        return response(['message' => 'Status has been updated!']);
    //    }


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
