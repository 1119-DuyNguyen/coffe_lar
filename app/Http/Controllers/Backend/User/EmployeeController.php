<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\EmployeeRequest;
use App\Models\Checkin;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

    public function getMySalaryForm()
    {
        return view('admin.employees.my-salary-form');
    }

    public function getMySalary(Request $request)
    {
        $user = User::with('contract.checkins')->findOrFail(Auth::user()->id);
        $day = Carbon::createFromFormat('Y-m', $request->input('month'));
        $month = $request->input('month');

        $checkin = Checkin::with('contract.user')->whereMonth('date', '=', $day->month)->whereYear(
            'date',
            '=',
            $day->year
        )
            ->whereHas('contract', function ($query) {
                $query->where('user_id', '=', Auth::user()->id);
            })
            ->first();
        if (empty($checkin)) {
            Notification::make()->title("Không tìm thấy tháng chấm công")->info()->send();
            return redirect()->back();
        }
        $pdf = Pdf::loadView('admin.prints.my-salary', compact('checkin', 'day', 'month'));
        return $pdf->stream('luong-cua-toi-' . $month . '.pdf');
    }


    public function getSalary(Request $request)
    {
        $day = Carbon::createFromFormat('Y-m', $request->input('month'));
        $checkins = Checkin::with('contract.user')->whereMonth('date', '=', $day->month)->whereYear(
            'date',
            '=',
            $day->year
        )->get();
        $month = $request->input('month');
        $pdf = Pdf::loadView('admin.prints.salary', compact('checkins', 'day', 'month'));
        return $pdf->stream('luong-' . $month . '.pdf');
    }

}
