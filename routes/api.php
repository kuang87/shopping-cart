<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function (){
    return response()->json(['ack' => time()]);
});

Route::prefix('products')->group(function (){
    Route::get('', function (){
        $products = \App\Bakery::paginate(2);

        return new \App\Http\Resources\BakeryCollection($products);
    })->name('products.index');

    Route::get('create', function (){
        return response()->json(['route' => 'products.create']);
    })->name('products.create');

    Route::post('', function (){
        return response()->json(['route' => 'products.store']);
    })->name('products.store');

    Route::get('{product}', function (\App\Bakery $product){
        return new \App\Http\Resources\Bakery($product);
    })->name('products.show');

    Route::get('{product}/edit', function (){
        return response()->json(['route' => 'products.edit']);
    })->name('products.edit');

    Route::match(['patch', 'put'], '{product}', function (){
        return response()->json(['route' => 'products.update']);
    })->name('products.update');

    Route::delete('{product}', function (){
        return response()->json(['route' => 'products.delete']);
    })->name('products.delete');
});