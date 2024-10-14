<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->bigInteger('geo_id')->unsigned()->nullable();
            $table->bigInteger('organization_id')->unsigned()->nullable();            
			$table->string('code',10)->nullable();
            $table->string('name',100);
            $table->text('description')->nullable();
            $table->text('closeup')->nullable();
            $table->text('ddd')->nullable();
            $table->text('pmp')->nullable();
			$table->date('start')->nullable();
            $table->date('end')->nullable();
			$table->integer('qty_days')->nullable();
			$table->integer('qty_holidays')->nullable();
			$table->integer('qty_real_days')->nullable();
            $table->enum('status', ['creado', 'activo','bloqueado','cerrado'])->nullable();
			$table->boolean('ready_mm_mp')->default(false);
			$table->boolean('locked_mm')->default(false);
			$table->boolean('locked_mp')->default(false);
			$table->boolean('active')->default(true);
            $table->timestampsTz();
            $table->softDeletesTz();
            
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('geo_id')->references('id')->on('geo');
			$table->foreign('organization_id')->references('id')->on('organizations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
