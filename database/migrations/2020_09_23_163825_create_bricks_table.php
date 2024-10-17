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
            $table->foreignId('district_id')->nullable()->references('id')->on('districts');
			$table->string('code',10)->nullable();
            $table->string('name',100);
            $table->text('description')->nullable();
            $table->geography('location', 'point')->nullable();
            $table->boolean('active')->default(true);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->auditable();
        });

        Schema::table('bricks', function (Blueprint $table) {
            DB::statement("UPDATE `bricks` SET `location` = ST_GeomFromText('POINT(0 0)', 4326);");
            DB::statement("ALTER TABLE `bricks` CHANGE `location` `location` POINT NOT NULL;");

            $table->spatialIndex('location');
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
