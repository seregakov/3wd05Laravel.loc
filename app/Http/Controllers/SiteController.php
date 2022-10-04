<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __invoke()
    {
        //select * from products where active = 1 and category_id = 1 order by id desc
        $latestProducts = Product::query()
            ->where('active', 1)
            ->limit(10)
            ->latest()
            ->get();
//        $collection = collect([1,2,3]);
//        $collection[] = 11;
//        dump($collection);
        return view('site.index', compact('latestProducts'));

    }

    public function store(){
        $products = Product::query()
            ->where('active', 1)
            ->limit(20)
            ->latest()
            ->get();

        $categories = Category::all();

        return view('site.store', compact('products', 'categories'));
    }

    public function product(Request $request, $category_id, $product_id)
    {

        $product = Product::where('active', 1)
            ->where('category_id', $category_id)
            ->where('id', $product_id)
            ->firstOrFail();

        return view('site.store_product', compact('product', 'product_id', 'category_id'));
    }

    public function categoryProducts($category_id)
    {
        $products = Product::where('active', 1)->where('category_id', $category_id)->get();
        return view('site.store_categories', compact('products', 'category_id'));
    }
}
