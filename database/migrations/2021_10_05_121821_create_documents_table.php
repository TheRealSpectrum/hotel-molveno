<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("documents", function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->date("date_of_birth");
            $table->string("document_type");
            $table->string("document_number");
            $table->date("document_expiration_date");
            $table->foreignId("reservation_id");
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
        Schema::dropIfExists("documents");
    }
}
