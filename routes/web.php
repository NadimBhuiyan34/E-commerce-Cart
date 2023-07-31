<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\SellController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Models\Book;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });




// frontend route
Route::get('/', function () {

    $books = Book::where('status', 1)->get();
    return view('frontend.homepage', compact('books'));
})->name('homepage');



// admin route
Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin/dashboard', function () {

        return view('admin.dashboard');

    })->name('admin');

    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class)->only(['index', 'store']);
    Route::post('books/delete', [BookController::class, 'destroy'])->name('books.destroy');
    Route::resource('sells', SellController::class)->only(['index', 'store']);
    Route::post('sells/delete', [SellController::class, 'delete'])->name('sells.delete');
    Route::get('sells/confirm', [SellController::class, 'confirm'])->name('sells.confirm');
    Route::resource('orders', OrderController::class);
    
});


// cart funtionality
Route::middleware('auth')->group(function () {

    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::post('/carts/delete', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::get('/shoppings', [CartController::class, 'shopping'])->name('shoppings.index');
    Route::post('/quantiy', [CartController::class, 'quantity'])->name('quantity.store');
});




// cart shipping funtionality
Route::middleware(['auth', 'checkCart'])->group(function () {

    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout.index');
    Route::get('/shippings', [CartController::class, 'shipping'])->name('shippings.index');
   

});
Route::resource('user_orders', UserOrderController::class)->only(['index', 'store'])->middleware('auth');

// order route




// profile route
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
