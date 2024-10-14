<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationGeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_geo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->index()->references('id')->on('organizations')->onDelete('cascade');
            $table->foreignId('geo_id')->index()->references('id')->on('geo')->onDelete('cascade');
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
        Schema::dropIfExists('organization_geo');
    }
}
