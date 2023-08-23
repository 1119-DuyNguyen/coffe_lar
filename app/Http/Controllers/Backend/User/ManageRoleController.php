<?php

namespace App\Http\Controllers\Backend\User;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\CrudTrait;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

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
        if($resource_id==0) return redirect()->back();
        $role=Role::findOrFail($resource_id);
        $permissionList=$request->input('permissions');
        $role->fill($request->all())->save();
        $role->permissions()->sync($permissionList);
        toast()->success('Updated Successfully!');

        return redirect()->back();
    }
    public function destroy($resource_id)
    {
        if($resource_id==0) return redirect()->back();
        
        $resource = $this->model()::findOrFail($resource_id);

        try {
            if ($this->getImageInput() && $resource->{$this->getImageInput()}) {
                {
                    $imagePath = $this->getImageInput();

                }
            }
            $resource->delete();

            if (isset($imagePath)) {
                $this->deleteImage($resource->{$this->getImageInput()});
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1451') {
                return response(['status' => 'error', 'message' => 'This item contain relation can\'t delete it.']);
            }

        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => "Can't do this action. Please try again later !"]);
        }

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);

    }
}
