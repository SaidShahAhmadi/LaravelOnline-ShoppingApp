<?php

namespace App\Http\Controllers;
use App\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CouponsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //geting coupon input value
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        //checking coupon code if there is no coupon
        // code so the message will be appared
        if(! $coupon){
            return redirect()->route('checkout.index')->withErrors('Invalid coupon code. Please try again ');
        }

        //store coupon information  in session 
        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::subtotal()),
        ]);
            return redirect()->route('checkout.index')->with('success_message', 'Coupon discount hase been applied');

    }

    /**
     * Remove the specified resource from storage.
    
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');
        return redirect()->route('checkout.index')->with('delete_message', 'Coupon discount hase been removed');

    }
}
