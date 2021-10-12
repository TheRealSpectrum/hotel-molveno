<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("reservation_package", function (Blueprint $table) {
            //
            $table->increments("id");
            $table->integer("reservation_id");
            $table->integer("package_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("reservation_package", function (Blueprint $table) {
            //
            $table->drop();
        });
    }
}
