<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group(
    [
        "prefix" => config("backpack.base.route_prefix", "admin"),
        "middleware" => array_merge(
            (array) config("backpack.base.web_middleware", "web"),
            (array) config("backpack.base.middleware_key", "admin")
        ),
        "namespace" => "App\Http\Controllers\Admin",
    ],
    function () {
        // custom admin routes
        Route::crud("room", "RoomCrudController");
        Route::crud("roomtype", "RoomtypeCrudController");
        Route::crud("guest", "GuestCrudController");
        Route::crud("reservation", "ReservationCrudController");
        Route::crud("document", "DocumentCrudController");
        Route::crud("package", "PackageCrudController");
        Route::get("api/room", "Api\FindRoomController@index");
        Route::get("api/room/{id}", "Api\FindRoomController@show");
        Route::get(
            "/reservation/checkinout/{id}",
            "CheckInOutController@index"
        );
        Route::get("room/edit/{id}/clean", "CleanController@index");
    }
); // this should be the absolute last line of this file
