<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtyClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_specialty', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialty_id')->index()->references('id')->on('specialties')->onDelete('cascade');
            $table->foreignId('client_id')->index()->references('id')->on('clients')->onDelete('cascade');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_specialty');
    }
}
