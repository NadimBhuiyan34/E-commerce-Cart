<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    public function shopping()
    {
        $shoppingCart = Cart::where('user_id', Auth::user()->id)->get();
        $totalPrice = 0;

        foreach ($shoppingCart as $item) {
            // Calculate total price for each item and add it to the overall total price
            $totalPrice += $item->quantity * $item->book->price;
        }
        return view('frontend.cart.shopping', compact('shoppingCart', 'totalPrice'));
    }



    public function checkout(Request $request)
    {
        $request->validate([
            'deliveryType' => 'required'
        ]);

        $deliveryType = $request->deliveryType;
        return redirect()->route('shippings.index')->with('deliveryType', $deliveryType);
    }




    public function shipping(Request $request)
    {
        $deliveryType = session('deliveryType');
        return view('frontend.cart.shipping', compact('deliveryType'));
    }



    public function store(Request $request)
    {

        $bookId = $request->bookId;
        $userId = Auth::user()->id;

        // Check if the book is already in the cart for the current user
        $cartItem = Cart::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->first();

        if ($cartItem) {
            // If the book is already in the cart, increment the quantity
            $cartItem->increment('quantity');
            $cartCount = Cart::where('user_id', $userId)->count();

            // Return the cart count as a JSON response
            return response()->json(['status' => 'success', 'cartCount' => $cartCount]);
        } else {
            // If the book is not in the cart, add a new cart item
            $cartItem = new Cart;
            $cartItem->user_id = $userId;
            $cartItem->book_id = $bookId;
            $cartItem->quantity = 1;
            $cartItem->save();
        }

        // Get the updated cart count for the user
        $cartCount = Cart::where('user_id', $userId)->count();

        // Return the cart count as a JSON response
        return response()->json(['status' => 'success', 'cartCount' => $cartCount]);
    }



    public function quantity(Request $request)
    {
        $userId = Auth::user()->id;
        $cartId = $request->cartId;
        $quantityType = $request->quantityType;


        $quantityupdate = Cart::find($cartId);
        if ($quantityType == 'add') {
            $quantityupdate->increment('quantity');
        } else {

            // Decrease quantity by 1
            if ($quantityupdate->quantity == 1) {
            } else {
                $quantityupdate->decrement('quantity', 1);
            }
        }

        $cartItem = Cart::where('user_id', $userId)->get();
        $totalPrice = 0;
        foreach ($cartItem as $item) {
            // Calculate total price for each item and add it to the overall total price
            $totalPrice += $item->quantity * $item->book->price;
        }

        return response()->json(['status' => 'success', 'totalprice' => $totalPrice]);
    }



    
    public function destroy(Request $request)
    {


        $userId = Auth::user()->id;

        $deleteBook = Cart::find($request->cartId)->delete();
        $cartCount = Cart::where('user_id', $userId)->get();
        $totalPrice = 0;
        $count = 0;

        foreach ($cartCount as $item) {
            // Calculate total price for each item and add it to the overall total price
            $totalPrice += $item->quantity * $item->book->price;
            $count++;
        }
        // Return the cart count as a JSON response
        return response()->json(['status' => 'success', 'cartCount' => $count, 'totalprice' => $totalPrice]);
    }
}
