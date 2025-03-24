<?php

use App\Http\Controllers\ActionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/1', function () {
    return view('1');
});

Route::get("/hendy", function(){
    return "<h1>Hendy Ganteng</h1>";
})->name("hendy");

Route::view("/hello", "hello", ["name"=>"hendy"]);

Route::get("/hello2", function(){
    return view("hello", ["name"=>"joko"]);
});

Route::view("/admin/hello", "admin.hello", ["name"=>"Susan"]);

Route::get("/admin/hello2", function(){
    return view("admin.hello", ["name"=>"devi"]);
});

Route::redirect("/ganteng", "/hendy");

Route::fallback(function(){
    return "404 Halaman tidak ditemukan!";
});

Route::get("/url/current", function(){
    return URL::full();
});

// redirect route named
Route::get("/redirect", function(){
    return route('hendy');
});

// url action
Route::get("/url/action", function(){
    return action([ActionController::class, 'index'], []);
})->name("action");