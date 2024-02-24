<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductObserver
{
    public function __construct(
        private readonly Request $request
    ) {
    }

    private function generateSlug(Product &$product)
    {
        // generate slug từ  $product-> name/ title
        $slug = "";
        // Check if unique  trong database Product
        //
        // gán trường slug attribute từ tên với hàm generate slug
        // check slug unique trong db Product::exists


    }

    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    public function creating(Product $product)
    {
        // unique
        // check exists then generate slug
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    public function updating(Product $product)
    {
        if (!($product->slug === $this->request->input('slug'))) {
            // check exists
            
            // then generate slug

            // đã exists thả lỗi
            throw ValidationException::withMessages([
                'message' => 'đã tồn tại slug'
            ]);
        }
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
