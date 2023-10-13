<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hendy", function(){
    return "<h1>Hendy Ganteng</h1>";
});

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