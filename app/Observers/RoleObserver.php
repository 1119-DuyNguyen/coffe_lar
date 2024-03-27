<?php

namespace App\Observers;

use App\Models\Role;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoleObserver
{

    public function __construct(
        private readonly Request $request
    ) {
    }

    /**
     * Handle the Role "created" event.
     */
    public function created(Role $role): void
    {
    }

    public function saved(Role $role): void
    {
        $permissionList = $this->request->input('permissions');
        if (is_array($permissionList)) {
            $role->permissions()->sync($permissionList);
        }
    }


    public function deleting(Role $role)
    {
        if ($role->id === 1 || $role->id === 2) {
            throw ValidationException::withMessages([
                'message' => 'Không đủ thẩm quyền để xoá'
            ]);
        }
    }

    /**
     * Handle the Role "deleted" event.
     */
    public function deleted(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "restored" event.
     */
    public function restored(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     */
    public function forceDeleted(Role $role): void
    {
        //
    }
}
