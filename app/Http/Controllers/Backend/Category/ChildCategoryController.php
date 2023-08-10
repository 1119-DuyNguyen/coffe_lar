<?php

namespace App\Http\Controllers\Backend\Category;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ChildCategoryRequest;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;
use Str;

class ChildCategoryController extends Controller
{
    use CrudTrait;

    protected function model(): string
    {
        return ChildCategory::class;
    }

    protected function getFormRequest(): FormRequest
    {
        return new ChildCategoryRequest();
    }
    protected function getInputSlug(): string
    {
        return 'name';
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.child-category.create', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $childCategory = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $childCategory->category_id)->get();

        return view('admin.child-category.edit', compact('categories', 'childCategory', 'subCategories'));
    }



//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(string $id)
//    {
//        $childCategory = ChildCategory::findOrFail($id);
//        if(Product::where('child_category_id', $childCategory->id)->count() > 0){
//            return response(['status' => 'error', 'message' => 'This item contain relation can\'t delete it.']);
//        }
//        $homeSettings = HomePageSetting::all();
//
//        foreach($homeSettings as $item){
//            $array = json_decode($item->value, true);
//            $collection = collect($array);
//            if($collection->contains('child_category', $childCategory->id)){
//                return response(['status' => 'error', 'message' => 'This item contain relation can\'t delete it.']);
//            }
//        }
//
//        $childCategory->delete();
//
//        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
//    }


}
