<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
			$table->foreignId('geo_id')->references('id')->on('geo')->onDelete('cascade');
	        $table->foreignId('organization_type_id')->references('id')->on('organization_types')->onDelete('cascade');
			$table->string('code', 20)->nullable();
            $table->string('name',100);
            $table->string('description')->nullable();
            $table->boolean('selected')->default(false);
            $table->boolean('active')->default(true);
			$table->timestampsTz();
			$table->softDeletesTz();
            $table->nestedSet();
            $table->auditable();
            $table->index('user_id')->nullable();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
        });
		
		Schema::create('brick_organization', function(Blueprint $table)
        {
			$table->increments('id');
            $table->foreignId('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreignId('brick_id')->references('id')->on('bricks')->onDelete('cascade');
  			$table->timestampsTz();
			$table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('brick_organization');
        Schema::dropIfExists('organizations');
		
    }
}
