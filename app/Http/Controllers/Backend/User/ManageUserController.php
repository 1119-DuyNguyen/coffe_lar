<?php

namespace App\Http\Controllers\Backend\User;

use App\DataTables\UserListDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRegisterRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\AccountCreatedMail;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Models\Vendor;
use App\Traits\CrudTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function App\Http\Controllers\Backend\toastr;

class ManageUserController extends Controller
{
    use CrudTrait;
    protected function model(): string
    {
        return User::class;
    }
    protected function addAutoInput(Request $request): array
    {
        $role_id=$request->input('role',[]) ;
        return ['role_id'=>$role_id];
    }
    protected function getFormRequest(): FormRequest
    {
        return new ProfileRegisterRequest();
    }
    public function index(UserListDataTable $dataTable)
    {
        return $dataTable->render('admin.user.index');
    }

    public function create()
    {
        $roleList=Role::all()->whereNotIn('id','1');
        return view('admin.user.create',compact( 'roleList'));
    }
    public function edit(User $user)
    {
        $roleList=Role::all()->whereNotIn('id','1');
        return view('admin.user.edit',compact( ['user','roleList']));
    }

}
