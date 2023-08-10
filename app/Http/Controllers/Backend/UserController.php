<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UserListDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use App\Traits\CrudApiTrait;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use CrudTrait;
    protected function model(): string
    {
        return User::class;
    }

    protected function getFormRequest(): FormRequest
    {
        return new ProfileUpdateRequest();
    }


    public function index(UserListDataTable $dataTable)
    {
        return $dataTable->render('admin.admin-list.index');
    }



    public function destory(string $id)
    {
        $admin = User::findOrFail($id);

        $products = Product::where('vendor_id', $admin->vendor->id)->get();

        if(count($products) > 0){
            return response(['status' => 'error', 'message' => 'Admin can\'t be deleted please ban the user insted of delete!']);
        }

        Vendor::where('user_id', $admin->id)->delete();
        $admin->delete();

        return response(['status' => 'success', 'message' => 'Deleted successfully']);

    }
}
