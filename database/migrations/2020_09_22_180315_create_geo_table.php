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
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('left')->nullable();
            $table->bigInteger('right')->nullable();
            $table->bigInteger('depth')->default(0);
            $table->char('name', 60);
            $table->text('alternames');
            $table->char('country', 2);
            $table->string('a1code', 25);
            $table->char('level', 10);
            $table->bigInteger('population');
            $table->decimal('lat', 9, 6);
            $table->decimal('long', 9, 6);
            $table->char('timezone', 30);
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
