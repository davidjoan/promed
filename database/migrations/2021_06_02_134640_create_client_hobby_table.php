<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientHobbyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_hobby', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->index()->references('id')->on('clients')->onDelete('cascade');
            $table->foreignId('hobby_id')->index()->references('id')->on('hobbies')->onDelete('cascade');
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
        Schema::dropIfExists('client_hobby');
    }
}
