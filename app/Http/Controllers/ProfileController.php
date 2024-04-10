<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\EmployeeRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\ProfileHandlerTrait;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

class ProfileController extends CRUDController
{
    use ProfileHandlerTrait;

    protected function CRUDViewPath(): string
    {
        return "admin.profiles";
    }

    protected function model(): string
    {
        return User::class;
    }

    protected function getFormRequest(): string
    {
        return EmployeeRequest::class;
    }

    protected function getNameRouteCRU(): string
    {
        return 'admin.employees';
    }

    protected function getFormElements(): array
    {
        return [
            [
                'type' => 'text',
                'name' => "name",
                'class' => "",
                'label' => "Họ tên",
            ],
            [
                'type' => 'text',
                'name' => "email",
                'class' => "",
                'label' => "Email",
            ],
            [
                'type' => 'text',
                'name' => "employee_code",
                'class' => "",
                'label' => "Mã nhân viên",
            ],
            [
                'type' => 'text',
                'name' => "phone",
                'class' => "",
                'label' => "Số điện thoại",
            ],
            [
                'type' => 'text',
                'name' => "address",
                'class' => "",
                'label' => "Địa chỉ liên hệ",
            ],
            [
                'type' => 'select',
                'name' => "role_id",
                'value' => function ($resource) {
                    return $resource->role_id;
                },
                'class' => "",
                'label' => "Chức vụ",
                'optionValues' => Role::employee()->get()->toArray(),
                'optionKey' => 'id',
                'optionLabel' => 'name'
            ],
            [
                'type' => 'date',
                'name' => "day_of_birth",
                'class' => "",
                'label' => "Ngày sinh",
            ],
            [
                'type' => 'select',
                'name' => "gender",
                'value' => function ($resource) {
                    return $resource->gender;
                },
                'optionValues' => [['label' => 'nam', "value" => 1], ['label' => 'nữ', "value" => 0]],
                'optionKey' => 'value',
                'optionLabel' => 'label',
                'class' => "",
                'label' => "Giới tính",
            ],
            [
                'type' => '',
                'name' => "tax_code",
                'class' => "",
                'label' => "Mã số thuế cá nhân",
            ],
            [
                'type' => 'text',
                'name' => "bank_number",
                'class' => "",
                'label' => "Số tài khoản ngân hàng",
            ],
        ];
    }

    public function editPassword(Request $request)
    {
        return view('admin.profiles.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $request->user()->update([
            'password' => bcrypt($request->input('password'))
        ]);
        Notification::make()->title("Mật khẩu đã được cập nhập thành công")->success()->send();
//        toast()->success('Mật khẩu đã được cập nhập thành công ');

        return redirect()->back();
    }
//    public function index()
//    {
//        $user = auth()->user();
//        //        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
////        return "404";
////        return view('frontend.pages.profile', compact('user'));
//    }
}
