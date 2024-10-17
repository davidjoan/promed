<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProvinceCapitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province_capitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('geo_id')->index()->references('id')->on('geo')->onDelete('cascade');
            $table->foreignId('province_id')->index()->references('id')->on('provinces')->onDelete('cascade');
            $table->foreignId('department_id')->index()->references('id')->on('departments')->onDelete('cascade');
            $table->string('capital')->nullable();//CAPITAL
            $table->string('district')->nullable();//DISTRITO
            $table->string('province')->nullable();//PROVINCIA
            $table->string('department')->nullable();//DEPARTAM
            $table->string('classification')->nullable();//CLASIF02
            $table->string('category')->nullable();//NOMCAT02
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
        Schema::dropIfExists('province_capitals');
    }
}
