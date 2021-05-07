<?php

use App\Http\Controllers\ApiDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

$apiController = new ApiDataController;

Route::get('/home', function (Request $request) use ($apiController) {
    $posts = $apiController->index($request);

    return view('home', ['posts' => $posts]);
});

Route::get('/post', function (Request $request) use ($apiController)  {
    $postBody = $apiController->bodyData($request);

    return view('postData', ['data' => $postBody['data']]);
});
