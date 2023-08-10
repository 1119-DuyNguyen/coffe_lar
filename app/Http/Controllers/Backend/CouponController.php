<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CouponRequest;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Coupon;
use App\Models\Product;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    use CrudTrait;
    protected function addAutoInput(): array
    {
      return  ['total_used'=>0];
    }

    protected function model(): string
    {
        return Coupon::class;
    }

    protected function getFormRequest(): FormRequest
    {
        return new CouponRequest();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('coupon'));
    }


}
