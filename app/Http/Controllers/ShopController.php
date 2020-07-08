<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select all product & showing it in shop page
        // $products = Product::inRandomOrder()->take(12)->get();
        // return view('shop')->with('products', $products);

        $pagination = 9;
        $categories = Category::all();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
                 $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else { 
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug = id
     * @return \Illuminate\Http\Response
     */
    
    public function show($slug)
    {
        //to Display the specfic porduct when we click it
        // slug is id here
            $product = Product::where('slug', $slug)->firstOrFail();
        //showing mightalsolike prodect in shop section
            $mightAlsoLike = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();
            
            return view('product')->with([
                'product' => $product,
                'mightAlsoLike' => $mightAlsoLike,
            ]);
    }
}
