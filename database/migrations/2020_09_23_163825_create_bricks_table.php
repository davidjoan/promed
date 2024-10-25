<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBricksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bricks', function (Blueprint $table) {
            $table->id();
			$table->foreignId('geo_id')->references('id')->on('geo');
			$table->foreignId('region_id')->references('id')->on('regions');
            $table->foreignId('district_id')->nullable()->references('id')->on('geo');
			$table->string('code',10)->nullable();
            $table->string('name',100);
            $table->text('description')->nullable();
            $table->geography('location', 'point')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('bricks');
    }
}
