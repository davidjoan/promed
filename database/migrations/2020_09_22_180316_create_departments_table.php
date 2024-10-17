<?php

use TarfinLabs\LaravelSpatial\Migrations\SpatialMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('geo_id')->index()->references('id')->on('geo')->onDelete('cascade');
            $table->string('code',2)->nullable(); //FIRST_IDDP
            $table->string('name')->nullable(); //NOMBDEP
            $table->float('ha', 12, 3)->nullable();//HECTARES
            $table->integer('count')->nullable();//COUNT
            $table->geography('location', 'point')->nullable();
            $table->boolean('active')->default(true);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->auditable();
        });

        Schema::table('departments', function (Blueprint $table) {
            DB::statement("UPDATE `departments` SET `location` = ST_GeomFromText('POINT(0 0)', 4326);");
            DB::statement("ALTER TABLE `departments` CHANGE `location` `location` POINT NOT NULL;");

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
        Schema::dropIfExists('departments');
    }
}
