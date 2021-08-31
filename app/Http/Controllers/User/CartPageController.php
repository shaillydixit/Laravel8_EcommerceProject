<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupan;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function MyCart()
    {
        return view('frontend.wishlist.view_mycart');
    }


    public function GetCartProduct()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),

        ));
    } //end method

    public function CartRemove($rowId)
    {
        Cart::remove($rowId);
        if (Session::has('coupan')) {
            Session::forget('coupan');
        }
        return response()->json(['success' => 'Product Removed From Cart Successfully']);
    }

    public function CartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        $getTotal = Cart::total();
        $removeDot = str_replace('.', '', $getTotal);
        $removeComma = str_replace(',', '', $removeDot);
        $cartTotal = $removeComma / 100;
        if (Session::has('coupan')) {
            $coupan_name = Session::get('coupan')['coupan_name'];
            $coupan = Coupan::where('coupan_name', $coupan_name)->first();

            Session::put('coupan', [
                'coupan_name' => $coupan->coupan_name,
                'coupan_discount' => $coupan->coupan_discount,
                'discount_amount' => round($cartTotal * $coupan->coupan_discount / 100),
                'total_amount' => round($cartTotal - $cartTotal * $coupan->coupan_discount / 100),
            ]);
        }
        return response()->json('increment');
    }
    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        $getTotal = Cart::total();
        $removeDot = str_replace('.', '', $getTotal);
        $removeComma = str_replace(',', '', $removeDot);
        $cartTotal = $removeComma / 100;
        if (Session::has('coupan')) {
            $coupan_name = Session::get('coupan')['coupan_name'];
            $coupan = Coupan::where('coupan_name', $coupan_name)->first();

            Session::put('coupan', [
                'coupan_name' => $coupan->coupan_name,
                'coupan_discount' => $coupan->coupan_discount,
                'discount_amount' => round($cartTotal * $coupan->coupan_discount / 100),
                'total_amount' => round($cartTotal - $cartTotal * $coupan->coupan_discount / 100),
            ]);
        }
        return response()->json('decrement');
    }
}
