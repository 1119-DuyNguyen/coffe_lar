<?php

namespace App\Http\Controllers\Backend\Staff;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDController;
use App\Http\Requests\Backend\StaffRequest;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

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
        return StaffRequest::class;
    }
}
