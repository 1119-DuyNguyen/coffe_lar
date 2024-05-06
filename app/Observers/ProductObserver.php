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

        // Check if unique  trong database Product
        //
        // gán trường slug attribute từ tên với hàm generate slug
        // check slug unique trong db Product::exists
        $StringNameOfSlug = \Str::slug($product->name, '-');
        $slugTonTai = Product::where('slug', $StringNameOfSlug)->exists();
        //nếu slug đã tồn tại
        if ($slugTonTai == true) {
            throw ValidationException::withMessages([
                'message' => 'đã tồn tại slug'
            ]);
        }
        $product->slug = $StringNameOfSlug;
    }

    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    private function shouldUpdateSlug(Product $product, $commingSlug): bool
    {
        return $product->isDirty('slug') && !($product->slug === $commingSlug && $product->slug != null);
    }

    public function creating(Product $product)
    {
        $commingSlug = $this->request->input('name');
        //        dd($product->slug === $this->request->input('slug') && $product->slug != null);
        if ($this->shouldUpdateSlug($product, $commingSlug)) {
            //            dd(Product::where('slug', \Str::slug($product->name, '-'))->exists());
            $this->generateSlug($product);
        }
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
        $commingSlug = $this->request->input('name');
        if ($this->shouldUpdateSlug($product, $commingSlug)) {
            // check exists
            // then generate slug
            // đã exists thả lỗi
            $this->generateSlug($product);
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
