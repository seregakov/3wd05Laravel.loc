<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\SiteProductController;
use Illuminate\Support\Facades\Storage;


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

Route::get('/', SiteController::class);
Route::get('/catalog/{category_id/{product_id}}', [SiteController::class, 'product'])->name('product_page');
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'getCart'])->name('cart');
Route::post('/add_to_cart', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('add_to_cart');

//    Route::get('/test', function (\Illuminate\Http\Request $request){
//        $response = Http::post('https://app.sms.by/api/v1/sendQuickSMS',[
//            'token' => '',
//            'message' => '',
//            'phone' => '',
//        ]);
//        dd($response->json());
//        });

Route::get('/test', function (\Illuminate\Http\Request $request) {
    $client = Http::baseUrl('https://favqs.com/api/qotd');
    $response = $client -> get('/');
    $result = $response['quote']['author'].' - '. $response['quote']['body'];
    dd($result);
});

//        $data = $request->all();
//        return response()->json($data)->setStatusCode(401);

//        $client = new \GuzzleHttp\Client();
//        $response = $client->request('GET', 'https://www.nbrb.by/api/exrates/currencies');
////        dd($response->getStatusCode());
//        dd(json_decode($response->getBody()->getContents(), true));


//        $client = new \GuzzleHttp\Client([
//            'base_uri' => 'https://www.nbrb.by/api/' // Для того чтобы не писать длинный url адрес
//        ]);
////        $response = $client->request('GET', 'exrates/currencies/145', [
////            'query' => [ // Для POST параметров используется formFDdata
////                'ondata' => '2016-7-1',
////                'periodcity' => 1,
////            ]
////        ]);
//        https://www.nbrb.by/api/exrates/currencies/19
//        $response = $client->get('exrates/currencies/145', [ //Второй метод отправки
//            'query' => [ // Для POST параметров используется formFDdata
//                'ondata' => '2016-7-1',
//                'periodcity' => 1,
//            ]
//        ]);
//
//        $response = $client->get('exrates/currencies/19', [ //Второй метод отправки
//            'query' => [ // Для POST параметров используется formFDdata
//                'ondata' => '2016-7-1',
//                'periodcity' => 1,
//            ]
//        ]);
////        dd($response->getStatusCode());
//        dd(json_decode($response->getBody()->getContents(), true));


//        $response = \Illuminate\Support\Facades\Http::
//            acceptJson()->
//
//            get('https://www.nbrb.by/api/exrates/currencies/145');
//        $response = \Illuminate\Support\Facades\Http::
//            withBasicAuth('login', 'adcsf')->
//            withToken('wefrvetvwrc', 'sdfcravg')->
//            post('https://www.nbrb.by/api/exrates/currencies/145', [
//                'sdcw' => 'adfwef'
//        ]);
//        if ($response->failed()){
//            switch (true){
//                case $response->clientError();
//                break;
//            }
//        }


Route::get('/store', [SiteController::class, 'store']);
Route::get('/catalog/{category_id}/{product_id}', [SiteController::class, 'product'])->name('category_product');
Route::get('/catalog/{category_id}', [SiteController::class, 'categoryProducts'])->name('categoryProduct');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->prefix('admin')->group(callback: function () {

    Route::get('/', [MyController::class, 'index'])->name('')->withoutMiddleware('auth');

    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'articles' => ArticleController::class,
    ]);
});
