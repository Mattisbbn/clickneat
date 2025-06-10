<?php

// use App\Http\Controllers\BasketController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\Clients\RestaurantController as ClientRestaurantController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LandpageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Restaurateur\OrderController as RestaurateurOrderController;
use App\Http\Controllers\Restaurateur\ItemsController as RestaurateurItemController;
use App\Http\Controllers\Restaurateur\CategoriesController as RestaurateurCategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Restaurateur\SettingsController as RestaurateurSettingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\IngredientController;
use App\Http\Controllers\AllergenController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
Route::middleware('FetchUserCart')->group(function (){
    Route::get("/",[LandpageController::class,"view"])->name("landpage.index");
    Route::get("/restaurant/{id}",[RestaurantController::class,"show"])->name("restaurants.show");
    Route::get("/restaurants",[ClientRestaurantController::class,"view"])->name("restaurants.view");
    Route::get("/article/{restaurant_id}/{id}",[ClientRestaurantController::class,"show"])->name("items.show");

});

Route::middleware(['auth','FetchUserCart','Role:client'])->group(function () {
    Route::post("/cart/{id}/create",[CartController::class,'store'])->name("cart.store");
    Route::patch('/cart/{id}/increment', [CartController::class, 'increment'])->name('cart.increment');
    Route::patch('/cart/{id}/decrement', [CartController::class, 'decrement'])->name('cart.decrement');
    Route::get("/panier",[CartController::class,"view"])->name("cart.index");
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/commandes', [OrderController::class, 'view'])->name('orders.index');

});
// Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/order/validate', [OrderController::class, 'validate'])->name('order.validate');

});

Route::middleware(['auth','Role:admin'])->prefix('admin')->group(function () {
    Route::get("/",[AdminController::class,"view"])->name("admin.index");
    Route::resource("restaurants",RestaurantController::class);
    Route::resource("categories",CategoryController::class);
    Route::resource("articles",ItemController::class);
    Route::resource("ingredients",IngredientController::class);
    Route::resource("allergens",AllergenController::class);
    Route::resource("orders",AdminOrderController::class);
});


Route::middleware(['auth','Role:restaurateur'])->prefix('restaurateur')->name("restaurateur.")->group(function () {
    Route::get("/",[RestaurateurOrderController::class,"index"])->name("restaurateur.index");
    Route::resource("orders",RestaurateurOrderController::class);
    Route::resource("items",RestaurateurItemController::class);
    Route::resource("categories",RestaurateurCategoryController::class);
    Route::resource("settings",RestaurateurSettingController::class);
});
Route::get("/contact",[ContactController::class,"view"])->name("contact.view");
Route::post("/contact", [ContactController::class, "send"])->name("contact.send");
Route::view("/mentions-legales", "guest.legal")->name("legal.view");


require __DIR__.'/auth.php';
