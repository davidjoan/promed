<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('geo_id')->index()->references('id')->on('geo')->onDelete('cascade');
            $table->foreignId('client_id')->index()->references('id')->on('clients')->onDelete('cascade');
			$table->foreignId('institution_id')->index()->references('id')->on('institutions')->onDelete('cascade');
            $table->foreignId('job_position_id')->index()->references('id')->on('job_positions')->onDelete('cascade');
            $table->foreignId('specialty_id')->index()->references('id')->on('specialties')->onDelete('cascade');
            $table->integer('qty_patiences')->default(0)->nullable();
            $table->decimal('avg_price_inquiry',12,2)->default(0.0)->nullable();
            $table->enum('social_level_patients', ['A','B','C'])->default('C');
            $table->boolean('attends_child')->default(false);
            $table->boolean('attends_teen')->default(false);
            $table->boolean('attends_adult')->default(false);
            $table->boolean('attends_old')->default(false);
            $table->boolean('attends_online')->default(false);
            $table->boolean('attends_face_to_face')->default(false);

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
        Schema::dropIfExists('targets');
    }
}
