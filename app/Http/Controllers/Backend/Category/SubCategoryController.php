<?php

namespace App\Http\Controllers\Backend\Category;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;
use Str;

class SubCategoryController extends Controller
{
    use CrudTrait;

    protected function model(): string{
        return SubCategory::class;
    }
    protected function getFormRequest(): FormRequest
    {
        return new SubCategoryRequest();
    }
    protected function getInputSlug():string{
        return 'name';
    }
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $subCategory = SubCategory::findOrFail($id);
        return view('admin.sub-category.edit', compact('subCategory', 'categories'));
    }



}
