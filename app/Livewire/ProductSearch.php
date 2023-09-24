<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Client\Request;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;

    public $searchTerm;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $products = Product::where(['status' => true]);
        $categories = Category::where(['status' => true])->get();
        $request = request();

        $this->categories = $categories;
        if ($request->filled('category')) {
            $category = $categories->firstWhere('slug', $request->input('category'));
            $category = Category::where('slug', $request->input('category', ''))->firstOrFail();
            $products = $products->where([
                'category_id' => $category->id,
            ]);
        }
        if(!empty($this->searchTerm)){
            $products = $products
                ->where('name', 'like', '%' . $this->searchTerm . '%')
                ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
                    ;
            }


        if ($request->filled('range-min') && $request->filled('range-max')) {
            $from = $request->input('range-min');
            $to = $request->input('range-max');
            $products = $products->where('price', '>=', $from)->where('price', '<=', $to);
        }
        $products = $products->orderBy('id', 'DESC')->paginate(6);

        return view('livewire.product-search',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
