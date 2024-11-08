<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo', function (Blueprint $table) {
            $table->id();            
            $table->char('name', 60);
            $table->char('level', 10);
            $table->char('country', 2)->nullable();
            $table->string('a1code', 2)->nullable();
            $table->string('a2code', 4)->nullable();
            $table->string('a3code', 6)->nullable();
            $table->bigInteger('population');
            $table->geography('location', 'point')->nullable();
            $table->string('timezone', 30)->nullable();
            $table->nestedSet();
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->auditable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geo');
    }
}
