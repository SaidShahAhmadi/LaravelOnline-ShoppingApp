<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //to show mightalsolike prouduct in cart page
        $mightAlsoLike = Product::mightAlsoLike()->get();
        return view('cart')->with('mightAlsoLike', $mightAlsoLike);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //duplicates items when add 
        //To find an item in the cart, you can use the search() method.
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        //if duplicates isNOtEmpty redirect the cart.index page
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'This Item is already in your cart!');
        }

        //adding product to cart we use laravelshoping libarly function add()
        //and this function should be dwon
        Cart::add($request->id, $request->name, 1, $request->price)
        ->associate('App\Product');  // associate product model
        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //removeing product from cart 
            Cart::remove($id);
            return back()->with('success_message', 'Item has been removed!');
    }

    /**
     * Switch item for shopping cart to Save for Later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        //Cart::get() 
        //If you want to get an item from the cart using its rowId,-
        // you can simply call the get() method on the cart and pass it the rowId.

        $item = Cart::get($id);
        Cart::remove($id);

        //for duplicateing
        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');
        }


        //associate() 
    //Because it can be very convenient to be able to directly access a 
    //model from a CartItem is it possible to associate a model with the items in the cart.
    // Let's say you have a Product model in your application. With the associate() method, 
    //you can tell the cart that an item in the cart, is associated to the Product mode
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');
        return redirect()->route('cart.index')->with('success_message', 'Item has been Saved For Later!');
    }
}
