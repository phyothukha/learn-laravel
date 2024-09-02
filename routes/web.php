<?php

use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\FirstController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view("about");
});


Route::get("/contact", function () {
    return view("contact");
})->name("contact");


Route::get("/products", function () {
    $products = Http::get('https://fakestoreapi.com/products')->object();
    dd($products[5]->price);
});

Route::get("/products/price-max/{amount}/", function ($amount) {
    $products = Http::get("https://fakestoreapi.com/products")->json();
    $products = collect($products)->where("price", "<", $amount);
    dd($products);
});





Route::post("/exchange", [ExchangeController::class, "exchange"])->name("exchange");

Route::get("/run", [FirstController::class, "run"]);

Route::post("/exchange-to-mmk", [FirstController::class, "exChangeTommk"])->name("exchange-to-mmk");

Route::view("/exchange-calculator", "exchange")->name("exchange-calculator");
