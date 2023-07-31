<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {


        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',

            ]

        );
        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->is_active = $request->isActive;

        $category->save();
        return response()->json(['status' => 'success']);
    }
}
