<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('geo_id')->index()->references('id')->on('geo')->onDelete('cascade');
            $table->foreignId('department_id')->index()->references('id')->on('departments')->onDelete('cascade');
            $table->string('code',4)->nullable(); //FIRST_IDPR
            $table->string('name')->nullable(); //NOMBPROV
            $table->string('department')->nullable();//FIRST_NOMB
            $table->float('ha', 12, 2)->nullable();//HECTARES
            $table->integer('count')->nullable();//COUNT
            $table->string('last_doc')->nullable();//LAST_DCTO
            $table->string('last_law')->nullable();//LAST_LEY
            $table->date('first_date')->nullable();//FIRST_FECH
            $table->date('last_date')->nullable();//LAST_FECHA
            $table->float('min_shape', 18, 5)->nullable();//HECTARES
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
        Schema::dropIfExists('provinces');
    }
}
