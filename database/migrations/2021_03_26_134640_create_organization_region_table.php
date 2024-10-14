<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_region', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->index()->references('id')->on('organizations')->onDelete('cascade');
            $table->foreignId('region_id')->index()->references('id')->on('regions')->onDelete('cascade');
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
        Schema::dropIfExists('organization_region');
    }
}
