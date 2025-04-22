<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\Clients\RestaurantController as ClientRestaurantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandpageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Restaurateur\OrderController as RestaurateurOrderController;
use App\Http\Controllers\Restaurateur\ItemsController as RestaurateurItemController;


Route::middleware('FetchUserCart')->group(function (){
    Route::get("/",[LandpageController::class,"view"])->name("landpage.index");
    Route::get("/restaurant/{id}",[RestaurantController::class,"show"])->name("restaurants.show");
    Route::get("/restaurants",[ClientRestaurantController::class,"view"])->name("restaurants.view");
    Route::get("/article/{restaurant_id}/{id}",[ClientRestaurantController::class,"show"])->name("items.show");

});

Route::middleware(['auth','FetchUserCart'])->group(function () {
    Route::post("/cart/{id}/create",[CartController::class,'store'])->name("cart.store");
    Route::patch('/cart/{id}/increment', [CartController::class, 'increment'])->name('cart.increment');
    Route::patch('/cart/{id}/decrement', [CartController::class, 'decrement'])->name('cart.decrement');
    Route::get("/panier",[CartController::class,"view"])->name("cart.index");
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/commandes', [OrderController::class, 'view'])->name('orders.index');

});
// Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/order/validate', [OrderController::class, 'validate'])->name('order.validate');

});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get("/restaurants",[RestaurantController::class,"view"])->name("restaurants.admin.index");
    Route::get("/restaurants/{id}/show",[RestaurantController::class,"show"])->name("restaurants.admin.show");
    Route::delete("/restaurants/{id}/delete",[RestaurantController::class,"delete"])->name("restaurants.delete");
    Route::get("/restaurants/{id}/edit",[RestaurantController::class,"edit"])->name("restaurants.edit");
    Route::put("/restaurants/{id}/update",[RestaurantController::class,"update"])->name("restaurants.update");
    Route::get("/restaurants/create",[RestaurantController::class,"create"])->name("restaurants.create");
    Route::post("/restaurants",[RestaurantController::class,"store"])->name("restaurants.store");

    Route::get("/categories",[CategoryController::class,"view"])->name("categories");
    Route::delete("/categories/{id}/delete",[CategoryController::class,"delete"])->name("categories.delete");
    Route::get("/categories/{id}/show",[CategoryController::class,"show"])->name("categories.show");
    Route::get("/categories/{id}/edit",[CategoryController::class,"edit"])->name("categories.edit");
    Route::put("/categories/{id}/update",[CategoryController::class,"update"])->name("categories.update");
    Route::get("/categories/create",[CategoryController::class,"create"])->name("categories.create");
    Route::post("/categories",[CategoryController::class,"store"])->name("categories.store");
});

Route::middleware(['auth','Role:restaurateur'])->prefix('restaurateur')->name("restaurateur.")->group(function () {
    Route::get("/",[RestaurateurOrderController::class,"index"])->name("restaurateur.index");
    Route::resource("orders",RestaurateurOrderController::class);
    Route::resource("items",RestaurateurItemController::class);
});













require __DIR__.'/auth.php';
