<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\LogAccessMiddleware;

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

// Route::get('/', 'HomeController@principal');
//middleware passou para o kernel.php
// Route::middleware(LogAccessMiddleware::class)
//         ->get('/', 'HomeController@principal')
//         ->name("site.index");


// php artisan make:list

Route::get('/', 'HomeController@principal')
    ->name("site.index")->middleware('log.access');

Route::get('/contact', 'ContactController@contact')->name("site.contact");
Route::post('/contact', 'ContactController@save')->name("site.contact");

Route::get('/about-us', 'AboutUsController@aboutUs')->name("site.aboutus");

Route::get('/login/{error?}', 'LoginController@index')->name("site.login"); // parametro opcional(?) login/{error?} 
Route::post('/login', 'LoginController@authenticate')->name("site.login");

Route::middleware('autentication:default,guest')->prefix('app')->group(function () {
    // Route::middleware('log.access','autentication')->get('/customers', function () { return "customers"; })->name("app.customers");
    Route::get('/home', 'HomeAppController@index')->name("app.home");
    Route::get('/exit', 'LoginController@exit')->name("app.exit");
    // Route::get('/customer', 'CustomerController@index')->name("app.customer");

    Route::get('/supplier', 'SupplierController@index')->name("app.supplier");
    Route::get('/supplier/list', 'SupplierController@list')->name("app.supplier.list");
    Route::get('/supplier/listFiltered', 'SupplierController@listFiltered')->name("app.supplier.listFiltered");
    Route::post('/supplier/listFiltered', 'SupplierController@listFiltered')->name("app.supplier.listFiltered");
    Route::get('/supplier/add', 'SupplierController@add')->name("app.supplier.add");
    Route::get('/supplier/edit/{id}/{msg?}', 'SupplierController@edit')->name("app.supplier.edit");
    Route::post('/supplier/add', 'SupplierController@add')->name("app.supplier.add");
    Route::get('/supplier/delete/{id}', 'SupplierController@delete')->name("app.supplier.delete");

    // Route::get('/product', 'ProductController@index')->name("app.product");
    // Route::get('/product/create', 'ProductController@create')->name("app.product.create");
    Route::resource('/product', 'ProductController');

    // php artisan make:controller -r ProductDetailController --model=ProductDetail
    Route::resource('/product_details', 'ProductDetailController');


    // don't need fill create, delete, etc. Goes to methods of Controller
    Route::resource('/customer', 'CustomerController');
    Route::resource('/contact', 'ContactController');
    Route::resource('/order', 'OrderController');
    Route::resource('/product', 'ProductController');

    // Route::resource('/product_order', 'ProductOrderController');
    Route::get('/product_order/create/{order}', 'ProductOrderController@create')->name("product_order.create");
    Route::post('/product_order/store/{order}', 'ProductOrderController@store')->name("product_order.store");
    // Route::delete('/product_order/destroy/{order}/{product}', 'ProductOrderController@destroy')->name("product_order.destroy");
    Route::delete('/product_order/destroy/{orderProduct}/{order_id}', 'ProductOrderController@destroy')->name("product_order.destroy");
});



Route::get(
    '/contact/{name}/{category}/{subject}/{message?}',
    function (
        string $name = "name don't sent.",
        string $category = "category  don't sent.",
        string $subject = "subject don't sent.",
        string $message = "message não enviada."
    ) {
        return "Contact $name - $category - $subject - $message";
    }
);

Route::get(
    '/contact/{name}/{category_id}',
    function (
        string $name = "name don't sent.",
        int $category_id = 50
    ) {
        return "Contact $name -  $category_id";
    }
)->where('category_id', '[0-9]+')->where('name', '[a-zA-Z]+');

// redirecionamento de rotas
Route::get('/route1', function () {
    return "Route 1";
})->name("site.route1");

// Route::redirect('/rota2','/route1'); passou para o comntroler em baixo
Route::get('/rota2', function () {
    return redirect()->route('site.route1');
})->name("site.rota2");


Route::fallback(function () {
    echo "This route doesn't exists. <a href='" . route('site.index') . "'>Click here</a> to go home page.";
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name("teste");
