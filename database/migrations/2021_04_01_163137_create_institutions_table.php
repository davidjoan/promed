<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->index()->references('id')->on('companies')->onDelete('cascade');
            $table->foreignId('geo_id')->index()->references('id')->on('geo')->onDelete('cascade');
			$table->foreignId('institution_type_id')->index()->references('id')->on('institution_types')->onDelete('cascade');
            $table->foreignId('brick_id')->nullable()->references('id')->on('bricks')->onDelete('cascade');
            $table->foreignId('specialty_id')->nullable()->references('id')->on('specialties')->onDelete('cascade');
            $table->foreignId('district_id')->nullable()->references('id')->on('districts')->onDelete('cascade');
            $table->string('code',10)->nullable();
            $table->string('ruc' ,11)->nullable();
            $table->string('name',500);
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->text('reference')->nullable();
            $table->decimal('latitude',10,8)->nullable();
            $table->decimal('longitude',10,8)->nullable();
            $table->geography('location', 'point')->nullable();

            $table->bigInteger('osm_id')->nullable();
            $table->string('osm_type')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('uuid')->nullable();
            $table->boolean('emergency')->default(false);
            $table->boolean('ambulance')->default(false);
            $table->boolean('wheelchair')->default(false);
            $table->boolean('dispensing')->default(false);
            $table->integer('capacity_staff')->nullable();
            $table->string('website')->nullable();
            $table->string('fanpage')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('operator')->nullable();
            $table->string('operator_type')->nullable();

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
        Schema::dropIfExists('institutions');
    }
}
