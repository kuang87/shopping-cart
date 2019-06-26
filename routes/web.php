<?php

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

Route::get('/', function () {
    $bakeries = \App\Bakery::all();
    return view('bakeries', [
        'bakeries' => $bakeries,
    ]);
});

Route::get('bakeries/{bakery}', function (\App\Bakery $bakery){
    Cart::add($bakery->id, $bakery->name, $bakery->price, 1);

    //Cart::store(1)->content();
    //$total = Cart::getTotal();
    //dd($total);
    return back();
})->name('bakery.add');
