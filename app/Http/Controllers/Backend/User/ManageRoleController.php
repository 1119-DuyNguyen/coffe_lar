<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\CrudTrait;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class ManageRoleController extends CRUDController
{

    protected function model(): string
    {
        return Role::class;
    }

    protected function getFormRequest(): string
    {
        return RoleRequest::class;
    }

    protected function CRUDViewPath(): string
    {
        return "admin.roles";
    }

    protected function getNameRouteCRU(): string
    {
        return "admin.roles";
    }

    protected function getFormElements(): array
    {
        return [
            [
                'type' => 'text',
                'name' => "name",
                'class' => "",
                'label' => "Tên chức vụ",
            ],
            [
                'type' => 'textfield',
                'name' => "description",
                'class' => "",
                'label' => "Mô tả",
            ],
            [
                'type' => 'checkbox',
                'name' => "permissions",
                'value' => function ($role) {
                    return DB::table('permission_role')->where('role_id', $role->id)->pluck('permission_id')->toArray();
                },
                'class' => "",
                'label' => "Quyền",
                'optionValues' => Permission::all()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],
        ];
    }


//    public function store(RoleRequest|\Illuminate\Http\Request $request)
//    {
//        $role = Role::create($request->all());
//        $role->permissions()->attach($request->input('permissions'));
//        toast()->success('Khởi tạo dữ liệu thành công');
//
//        return redirect()->back();
//    }
//
//    public function update(RoleRequest $request, $resource_id)
//    {
//        if ($resource_id == 0) {
//            return redirect()->back();
//        }
//        $role = Role::findOrFail($resource_id);
//        $permissionList = $request->input('permissions');
//        $role->fill($request->all())->save();
//        $role->permissions()->sync($permissionList);
//        toast()->success('Cập nhập dữ liệu thành công!');
//
//        return redirect()->back();
//    }
//
//    public function destroy($resource_id)
//    {
//        $resource = $this->model()::findOrFail($resource_id);
//
//        try {
//            $resource->delete();
//        } catch (\Illuminate\Database\QueryException $e) {
//            $errorCode = $e->errorInfo[1];
//            if ($errorCode == '1451') {
//                return response(['status' => 'error', 'message' => 'This item contain relation can\'t delete it.']);
//            }
//        } catch (Exception $e) {
//            return response(['status' => 'error', 'message' => "Can't do this action. Please try again later !"]);
//        }
//
//        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
//    }


}
