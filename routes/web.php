<?php

use App\Http\Controllers\GuestController;
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

Route::get("/", function () {
    return view("welcome");
});

Route::get("/dashboard", function () {
    return view("dashboard");
})
    ->middleware(["auth"])
    ->name("dashboard");

Route::resource("account", GuestController::class);
// Route::get("account", [GuestController::class, "index"])->name("account.index");
// Route::post("account", [GuestController::class, "store"])->name(
//     "account.store"
// );
// Route::get("account/edit/{id}", [GuestController::class, "edit"])->name(
//     "account.edit"
// );
// Route::put("account/edit", [GuestController::class, "update"])->name(
//     "account.update"
// );

require __DIR__ . "/auth.php";
