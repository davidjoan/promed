<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('geo_id')->index()->references('id')->on('geo')->onDelete('cascade');
            $table->foreignId('province_id')->index()->references('id')->on('provinces')->onDelete('cascade');
            $table->foreignId('department_id')->index()->references('id')->on('departments')->onDelete('cascade');
            $table->string('code',6)->nullable(); //IDDIST
            $table->string('name')->nullable(); //NOMBDIST
            $table->string('province')->nullable();//NOMBPROV
            $table->string('department')->nullable();//NOMBDEP
            $table->string('capital')->nullable();//NOM_CAP
            $table->float('ha', 18, 5)->nullable();//AREA_MINAM
            $table->string('last_doc')->nullable();//DCTO
            $table->string('last_law')->nullable();//LEY
            $table->date('last_date')->nullable();//FECHA
            $table->float('shape_length', 18, 5)->nullable();//SHAPE_LENG
            $table->float('shape_area', 18, 5)->nullable();//SHAPE_AREA
            $table->float('shape_length_1', 18, 5)->nullable();//SHAPE_LE_1
            $table->float('shape_area_1', 18, 5)->nullable();//SHAPE_AR_1
            $table->geography('location', 'point')->nullable();
            $table->boolean('active')->default(true);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->auditable();
        });

        Schema::table('districts', function (Blueprint $table) {
            DB::statement("UPDATE `districts` SET `location` = ST_GeomFromText('POINT(0 0)', 4326);");
            DB::statement("ALTER TABLE `districts` CHANGE `location` `location` POINT NOT NULL;");

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
        Schema::dropIfExists('districts');
    }
}
