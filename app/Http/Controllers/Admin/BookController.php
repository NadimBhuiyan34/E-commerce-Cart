<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $categories = Category::where('is_active','1')->get();
        return view('admin.books.index', compact('books','categories'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|string|max:255',
                'price' => 'required',


            ]

        );
        $book = new Book();
        $book->category_id = $request->categoryId;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->quantity = $request->quantity;
        $book->discount = $request->discount;
        $book->status = $request->isActive;

        $book->save();
        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
          $deleteBook=Book::find($request->bookId)->delete();
        return response()->json(['status' => 'success']);
    }
}
