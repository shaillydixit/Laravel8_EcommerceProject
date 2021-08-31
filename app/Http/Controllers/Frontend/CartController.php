<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupan;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        if (Session::has('coupan')) {
            Session::forget('coupan');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added To Your Cart']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added To Your Cart']);
        }
    }

    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Successfully Removed From Cart']);
    }

    public function AddToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $userexists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$userexists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Successfully Added To Your Wishlist']);
            } else {
                return response()->json(['error' => 'This Product Is Already In Your Wishlist']);
            }
        } else {
            return response()->json(['error' => 'First Login To Your Account']);
        }
    }

    //coupan
    public function CoupanApply(Request $request)
    {
        $coupan = Coupan::where('coupan_name', $request->coupan_name)->where('coupan_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        $getTotal = Cart::total();
        $removeDot = str_replace('.', '', $getTotal);
        $removeComma = str_replace(',', '', $removeDot);
        $cartTotal = $removeComma / 100;
        if ($coupan) {
            Session::put('coupan', [
                'coupan_name' => $coupan->coupan_name,
                'coupan_discount' => $coupan->coupan_discount,
                'discount_amount' => round($cartTotal * $coupan->coupan_discount / 100),
                'total_amount' => round($cartTotal - $cartTotal * $coupan->coupan_discount / 100),
            ]);

            return response()->json(array(
                'success' => 'Coupan Applied Successfully'
            ));
        } else {
            return response()->json(['error' => 'Invalid Coupan']);
        }
    }

    public function CoupanCalculation()
    {
        if (Session::has('coupan')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupan_name' => session()->get('coupan')['coupan_name'],
                'coupan_discount' => session()->get('coupan')['coupan_discount'],
                'discount_amount' => session()->get('coupan')['discount_amount'],
                'total_amount' => session()->get('coupan')['total_amount']
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    }

    public function CoupanRemove()
    {
        Session::forget('coupan');
        return response()->json(['success' => 'Coupan Removed Successfully']);
    }
}
