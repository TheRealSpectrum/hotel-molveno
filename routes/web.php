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
    return redirect(url("home"));
})->name("home");

Route::get("welcome", function () {
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

Route::get("bookings", [BookingController::class, "index"])->name(
    "booking.index"
);

Route::get("bookings/create", [BookingController::class, "step2"])->name(
    "booking.step2"
);

Route::get("bookings/create/step3", [BookingController::class, "step3"])->name(
    "booking.step3"
);

Route::get("bookings/create/step4", [
    BookingController::class,
    "personalInfo",
])->name("booking.personalInfo");

Route::post("bookings/create/confirm", [
    BookingController::class,
    "confirmBooking",
])->name("booking.confirm");

Route::delete("bookings/delete/{id}", [
    BookingController::class,
    "destroy",
])->name("booking.destroy");

require __DIR__ . "/auth.php";

/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
Route::get("{page}/{subs?}", [
    "uses" => "\App\Http\Controllers\PageController@index",
])->where(["page" => '^(((?=(?!admin))(?=(?!\/)).))*$', "subs" => ".*"]);
