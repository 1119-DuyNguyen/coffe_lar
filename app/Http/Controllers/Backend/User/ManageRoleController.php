<?php

namespace App\Http\Controllers\Backend\User;

use App\DataTables\RoleDataTable;
use App\DataTables\UserListDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RoleRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\AccountCreatedMail;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Models\Vendor;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use function App\Http\Controllers\Backend\toastr;

class ManageRoleController extends Controller
{
    use CrudTrait;
    protected function model(): string
    {
        return Role::class;
    }

    protected function getFormRequest(): FormRequest
    {
        return new RoleRequest();
    }

    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('admin.role.index');
    }

    public function create()
    {
        return view('admin.role.create');
    }
    public function edit(Role $role)
    {
        return view('admin.role.edit',compact('role'));
    }


}
