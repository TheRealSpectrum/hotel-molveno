<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\BookingController;
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

Route::middleware("auth")->group(function () {
    Route::get("account", [GuestController::class, "index"])->name(
        "account.index"
    );
    Route::post("account", [GuestController::class, "create"])->name(
        "account.create"
    );
    Route::patch("account", [GuestController::class, "update"])->name(
        "account.update"
    );
});

Route::resource("bookings", BookingController::class);

require __DIR__ . "/auth.php";
