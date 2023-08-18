<?php

namespace App\Http\Controllers\Backend\User;

use App\DataTables\RoleDataTable;
use App\DataTables\UserListDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RoleRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\AccountCreatedMail;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Models\Vendor;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $permissionList=Permission::all();
        return view('admin.role.create',compact('permissionList'));
    }
    public function edit(Role $role)
    {
        $permissionList=Permission::all();
        $roleHasPermission= DB::table('permission_role')->where('role_id',$role->id)->pluck('permission_id')->toArray();
        return view('admin.role.edit',compact('role','permissionList','roleHasPermission'));
    }
    public function store(RoleRequest $request)
    {

        $role=Role::create($request->all());
        $role->permissions()->attach($request->input('permissions'));
        toast()->success('Created Successfully!');

        return redirect()->back();

    }
    public function update(RoleRequest $request,$resource_id)
    {
        $role=Role::findOrFail($resource_id);
        $permissionList=$request->input('permissions');
        $role->fill($request->all())->save();
        $role->permissions()->sync($permissionList);
        toast()->success('Updated Successfully!');

        return redirect()->back();
    }

}
