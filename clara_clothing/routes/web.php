<?php

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;

use App\Models\Product;
use App\Models\catagaory;
use App\Models\Maincatagories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Orderconform;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Customerdashboard;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;


use App\Http\Controllers\CatagaoryController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\NavbaritemsController;
use App\Http\Controllers\MaincatagoriesController;

use App\Http\Controllers\CustomerdashboardController;
use App\Http\Controllers\CustormerproductsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//----------------------------------Home Page-------------------------------------------------

// Route::get('/',[CustomersController::class, 'index'])->name('home');

// Route::get('/', function(){
//     $product = Product::all();
//     $maincats = Maincatagories::all();
//     return view('customer.index', compact('product','maincats'));
// })->name('home');


// Route::get('/', function(){
//     $product = Product::all();
//     $maincats = Maincatagories::all();
//     $products = Product::latest()->filter(request(['cat','psearch','search','sizes','pmin','pmax']))->paginate(6);
//     $cat = catagaory::all();
//     $sizes = DB::select('select distinct size from products');
//     $maincatss = DB::select("select distinct main_catagoryname from catagaories");
//     return view('customer.index', compact('product','maincats','products','cat','sizes','maincatss'));
// })->name('home');




Route::get('/custormer', [CustomersController::class, 'index'])->name('shop');

Route::get('/customer/cus_dashboard', [CustomersController::class, 'manage'])->name('cus_dashboard');

Route::get('/customer/contactus', [CustomersController::class, 'contact'])->name('contactus');

Route::get('/customer/index2', function () {
    return view('customer.index2');
});

Route::get('/shop',[CustormerproductsController::class, 'index']);


// Route::get('/customer/shop', function () {
//     return view('customer.shop');
// });

// Route::get('/customer/contactus', function () {
//     return view('customer.contactus');
// });

Route::get('/customer/cusTheme', function () {
    return view('customer.cusTheme');
})->name('cusTheme');

// Route::get('/customer/cus_dashboard', function () {
//     return view('customer.cus_dashboard');
// });

Route::get('/customer/cart', function () {
    return view('customer.cart');
});



Route::get('/customer/checkout', function () {
    return view('customer.checkout');
});

Route::get('/customer/show', function () {
    return view('customer.show');
});

Route::get('/components/layout', function () {
    return view('components.layout');
});





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->roll == 1){
            $users= User::where('roll','3')->count();
            $orders=Order::count();
            $items=Product::count();
            $rev = Order::sum('total');

            return view('admin.admin',compact('users','orders','items','rev'));
        }elseif(Auth::user()->roll == 2){
            return view('admin.admin');
        }elseif (Auth::user()->roll == 3){
            $id = Auth::user()->id;
            $ccount = DB::table('carts')->count();
            // $cart = DB::select('select * from carts where cusid = ?',[$id]);
            // $orders = DB::select('select * from orders where cusid = ?',[$id]);

            $cart = DB::table('products')
                        ->join('carts', 'products.id', '=', 'carts.productid')
                        ->select('products.*', 'carts.*')
                        ->where('cusid',[$id])
                        ->get();
    
            $users = DB::select('select * from customers where userid = ? limit 1',[$id]);
            $cusorder = DB::select('select count(*) from orders where cusid = ? ',[$id]);
            $cusorderitems = DB::select("select products from orders where cusid = ? and confirm = '1' ",[$id]);
            $product = Product::all();
    
            $orders = DB::select('select * from orders where pay = 0 limit 1');

            return view('customer.cus_dashboard', compact('ccount','cart','orders','cusorder','cusorderitems','users','product'));
        }

    })->name('dashboard');
});



Route::get('/shop/product/{product}',[CustormerproductsController::class, 'show']);
Route::get('/subcatagories/{{$navbaritems}}',[NavbaritemsController::class, 'show']);
Route::get('/maincatagories/{{$maincatagories}}',[MaincatagoriesController::class, 'show']);
// Route::get('/',[NavbaritemsController::class, 'index'])->name('home');


Route::resource('suppliers', SupplierController::class);
Route::resource('catagory', CatagaoryController::class);
Route::resource('catagory', CatagaoryController::class);
Route::resource('product', ProductController::class);
Route::resource('stocke', StockController::class);


Route::resource('staff', StaffController::class);
Route::resource('customer', CustomersController::class);
Route::resource('cproduct', CustormerproductsController::class);
Route::resource('cart', CartController::class);

Route::resource('maincatagories', MaincatagoriesController::class);
Route::resource('navbaritems', NavbaritemsController::class);

Route::get('/',[NavbaritemsController::class, 'index'])->name('home');

Route::resource('pay', PaymentController::class);
Route::resource('order', OrderController::class);
Route::resource('ordercon',Orderconform::class);
Route::resource('cusdash',CustomerdashboardController::class);

// Route::get('/dashboard',[CustomerdashboardController::class, 'index']);



