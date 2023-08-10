<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Str;

class CategorySubController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index($categoryId)
    {
        return SubCategory::where('category_id', $categoryId)->where('status', 1)->get();
    }
}
