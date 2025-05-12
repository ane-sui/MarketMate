<?php

use App\Http\Controllers\BotManController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchasesContoller;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRecomendationsController;
use App\Mail\ProductListed;
use App\Models\Chat;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

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
Route::get('test', function(){
    \Illuminate\support\Facades\Mail::to('anebasira@gmail.com')->send(
        new ProductListed()
    );
    return 'done';
});



Route::get('/', function () {
    return view('welcome', [
        'products' => Product::latest()->paginate(6),
    ]);
});

Route::get('contact',[ContactController::class,'index'] )->name('contact')
->middleware(['auth','verified']);
Route::get('about',[ContactController::class,'about'] )->name('about')
->middleware(['auth','verified']);




Route::get('/dashboard', function () {
    $topProducts = Product::join('sales', 'products.id', '=', 'sales.product_id')
    ->select('products.*', \Illuminate\Support\Facades\DB::raw('COUNT(sales.id) as purchase_count'))
    ->groupBy('products.id')
    ->orderBy('purchase_count', 'desc')
    ->take(5)
    ->get();

return view('dashboard', compact('topProducts'));



})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users',UserController::class)
    ->only(['index','create','store', 'edit', 'view', 'update', 'destroy'])
    ->middleware(['role:Admin']);

Route::get('charts', [ChartsController::class, 'charts'])->name('charts');
Route::get('recommendations', [UserRecomendationsController::class, 'topPurchasedProducts'])->name('recommendations');


    // Route::get('users', [UserController::class], 'view')->name('users.view');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('chat', ChatController::class)
    ->only(['index','create','store','show','update', 'destroy'])
    ->middleware(['auth', 'verified']);
Route::resource('messages',MessageController::class);

Route::resource('products', ProductController::class)
    ->only(['index','create','store', 'edit', 'show', 'view', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


Route::get('/search', SearchController::class);
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::resource('purchases',PurchasesContoller::class);

Route::middleware('auth')->group(function () {
    Route::get('cart',[CartController::class, 'index'])->name('cart.index');


});

Route::middleware('auth')->group( function(){
Route::post('checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
Route::match(['get', 'post'], '/botman',[BotManController::class, 'handle']);
});


require __DIR__.'/auth.php';
