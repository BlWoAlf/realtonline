<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adfm\Catalog\Product;
use App\Models\Adfm\Catalog\Category;

class CatalogController extends Controller
{
    public function showCatalog(Request $request)
    {
        $catalog = Product::filter($request->input('filter'))->orderBy('updated_at', 'desc')->paginate(20)->withQueryString();
        return view('adfm::public.catalog.catalog', compact('catalog'));
    }

    public function showProduct(Product $product)
    {
        $products = Product::inRandomOrder()->limit(4)->where('id','!=', $product->id)->get();
        return view('adfm::public.catalog.product', compact('product', 'products'));
    }

    public function showCategory(Category $category, Request $request)
    {
        $catalog = $category->products()->filter($request->input('filter'))->orderBy('updated_at', 'desc')->paginate(20)->withQueryString();
        return view('adfm::public.catalog.catalog', compact('catalog'));
    }

    public function showOrdering()
    {
        return view('adfm::public.catalog.order');
    }
}
