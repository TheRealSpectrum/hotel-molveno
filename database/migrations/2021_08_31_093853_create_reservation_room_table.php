<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("reservation_room", function (Blueprint $table) {
            //
            $table->increments("id");
            $table->integer("reservation_id");
            $table->integer("room_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("reservation_room", function (Blueprint $table) {
            //
            $table->drop();
        });
    }
}
