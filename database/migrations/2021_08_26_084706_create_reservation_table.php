<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("reservations", function (Blueprint $table) {
            $table->id();
            $table->date("check_in");
            $table->date("check_out");
            $table->integer("adults");
            $table->integer("children");
            $table->foreignId("guest_id")->constrained();
            $table->foreignId("roomtype_id")->constrained();
            //$table->foreignId("room_id")->constrained();
            $table->integer("total_price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("reservations");
    }
}
