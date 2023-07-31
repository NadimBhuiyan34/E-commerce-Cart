<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;

class UserOrderController extends Controller
{
    
    public function index()
    {
        $orders=Order::where('user_id',Auth::user()->id)->latest()->get();

        return view('frontend.order.index',compact('orders'));
    }

    // store order
    public function store(Request $request)
    {

        // generate a unique order code
        $orderCode = $this->generateUniqueOrderCode();

        $orderCreate = new Order();

        $orderCreate->user_id = Auth::user()->id;
        $orderCreate->order_code = $orderCode;
        $orderCreate->address = $request->address;
        $orderCreate->city = $request->city;
        $orderCreate->state = $request->state;
        $orderCreate->zip_code = $request->zipCode;
        $orderCreate->mobile_number = $request->mobileNumber;
        $orderCreate->delivery_type = $request->deliveryType;
        $orderCreate->status = 'pendding';

        $orderCreate->save();

        $orderId = Order::where('user_id', Auth::user()->id)->where('order_code', $orderCode)->first();

        $cartItem = Cart::where('user_id', Auth::user()->id)->get();
        // create order details
        $orderDetails = new OrderDetail();
        foreach ($cartItem as $item) {
            $orderDetails->order_id = $orderId->id;
            $orderDetails->title = $item->book->title;
            $orderDetails->quantity = $item->quantity;
            $orderDetails->total_price = $item->book->price * $item->quantity;

            $orderDetails->save();
        }

        // delete the cart item
        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('user_orders.index')->with('message','Order create successfully');
    }




    protected function generateUniqueOrderCode()
    {
        $timestamp = now()->format('YmdHis'); // Current timestamp
        $randomString = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 6); // Random alphanumeric string

        return $timestamp . $randomString;
    }
}
