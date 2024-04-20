<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\EmployeeRequest;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends CRUDController
{
    protected function CRUDViewPath(): string
    {
        return "admin.employees";
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

    public function getMySalary()
    {
        $user = User::with('contract.checkins')->findOrFail(Auth::user()->id);
        $pdf = Pdf::loadView('admin.prints.my-salary', compact('user'));
        $month = 1;
        return $pdf->stream('my-salary.pdf', compact('month'));
    }

    public function getSalary()
    {
        $users = User::with('contract.checkins')->get();
        $pdf = Pdf::loadView('admin.prints.salary', compact('users'));
        return $pdf->stream('salary.pdf');
    }
}
