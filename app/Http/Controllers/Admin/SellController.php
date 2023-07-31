<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Sell;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->get();

        $sellbooks = Sell::where('user_id', Auth::user()->id)
            ->where('status', null)
            ->get();
        return view('admin.sells.index', compact('books', 'sellbooks'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $sellBook = new Sell();
        $sellBook->user_id = Auth::user()->id;
        $sellBook->book_id = $request->bookId;
        $sellBook->customer_name = $request->customerName;
        $sellBook->mobile = $request->phoneNumber;
        $sellBook->quantity = $request->bookQuantity;
        $sellBook->total_price = $request->totalPrice;

        $sellBook->save();


        // Prepare the data for the new row


        // Return the JSON response with the new row data
        return response()->json([
            'status' => 'success',
            'total_price' => $request->totalPrice,

        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function confirm()
    {
        $confirmSell = Sell::where('user_id', Auth::user()->id)
            ->where('status', null)->get();

        foreach ($confirmSell as $sell) {
            $sell->update(['status' => 'confirmed']);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {

        $sellBook = Sell::find($request->sellBookId);
        $price = $sellBook->total_price;
        $sellBook->delete();

        return response()->json(['status' => 'success', 'total_price' => $price,]);
    }
}
