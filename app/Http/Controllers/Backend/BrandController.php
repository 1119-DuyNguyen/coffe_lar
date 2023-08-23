<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BrandRequest;
use App\Models\Brand;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;

class BrandController extends Controller
{

    use CrudTrait;
    /**
     * Display a listing of the resource.
     */
    protected function model(): string
    {
        return Brand::class;
    }

    protected function getFormRequest(): FormRequest
    {
        return new BrandRequest();
    }
    protected function getImageInput(): string|null
    {
        return 'logo';
    }
    protected function getImagePath(): string|null
    {
        return 'logo';
    }

    protected function getInputSlug(): string
    {
        return 'name';
    }
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');
    }
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }


}
