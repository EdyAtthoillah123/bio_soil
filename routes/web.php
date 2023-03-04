<?php

use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic;
use App\Http\Controllers\image_controller;

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

Route::get('/', [image_controller::class, 'index']);
Route::post('/store', [image_controller::class, 'store']);
Route::get('/dataimages', [image_controller::class, 'imagesave']);

Route::get('/rekapimage', function() {
    return view('rekapimage');
});

// Route::get('/', function () {
//     $img  = ImageManagerStatic::make('mugiwara.jpg');
//     $img->fit(400);
//     $img->greyscale();
//     $img->save('mugiwara1.jpg', 5);
// });
