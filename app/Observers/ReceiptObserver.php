<?php

namespace App\Observers;

use App\Models\Receipt;
use App\Models\Role;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReceiptObserver
{

    public function __construct(
        private readonly Request $request
    ) {
    }

    public function created(Receipt $receipt): void
    {
    }

    public function saved(Receipt $receipt): void
    {
        $productList = $this->request->input('products');
//        dd($productList);
        if (is_array($productList)) {
//            foreach ($productList as $key) {
//                $receipt->products()->attach($key);
//            }
            $receipt->products()->sync($productList);
        }
    }


    public function deleting(Receipt $receipt)
    {
//        if ($role->id === 1 || $role->id === 2) {
//            throw ValidationException::withMessages([
//                'message' => 'Không đủ thẩm quyền để xoá'
//            ]);
//        }
    }

    /**
     * Handle the Role "deleted" event.
     */
    public function deleted(Receipt $receipt): void
    {
        //
    }

    /**
     * Handle the Role "restored" event.
     */
    public function restored(Receipt $receipt): void
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     */
    public function forceDeleted(Receipt $receipt): void
    {
        //
    }
}
