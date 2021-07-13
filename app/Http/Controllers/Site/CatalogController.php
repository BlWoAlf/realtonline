<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adfm\Catalog\Product;
use App\Models\Adfm\Catalog\Category;

class CatalogController extends Controller
{
    public function showCatalog()
    {
        $catalog = Product::get();
        return view('adfm::public.catalog.catalog', compact('catalog'));
    }

    public function showProduct(Product $product)
    {
        $products = Product::inRandomOrder()->limit(4)->where('id','!=', $product->id)->get();
        return view('adfm::public.catalog.product', compact('product', 'products'));
    }

    public function showCategory(Category $category)
    {
        $catalog = $category->products()->get();
        return view('adfm::public.catalog.catalog', compact('catalog'));
    }

    public function showOrdering()
    {
        return view('adfm::public.catalog.order');
    }
}
