<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('geo_id')->index()->references('id')->on('geo')->onDelete('cascade');
            $table->foreignId('organization_id')->index()->references('id')->on('organizations')->onDelete('cascade');
            $table->foreignId('target_id')->index()->references('id')->on('targets')->onDelete('cascade');
            $table->foreignId('category_id')->index()->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('segment_id')->index()->references('id')->on('segments')->onDelete('cascade');
            $table->boolean('like')->default(false);
            $table->enum('score', [0,1,2,3,4,5])->default(0);
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
        Schema::dropIfExists('assignments');
    }
}
