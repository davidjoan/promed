<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('geo_id')->index()->references('id')->on('geo')->onDelete('cascade');
            $table->foreignId('client_type_id')->index()->references('id')->on('client_types')->onDelete('cascade');
            $table->foreignId('tuition_id')->index()->references('id')->on('tuitions')->onDelete('cascade'); //colegiatura
			$table->foreignId('nationality_id')->nullable()->references('id')->on('geo')->onDelete('cascade');
            $table->foreignId('specialty_id')->nullable()->references('id')->on('specialties')->onDelete('cascade');
            $table->foreignId('university_id')->nullable()->references('id')->on('specialties')->onDelete('cascade');
            $table->string('code',10)->nullable();
            $table->string('name',100);
            $table->enum('national_identity_type', ['DNI', 'Pasaporte'])->nullable();
            $table->string('national_identity',20)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone','100')->nullable();
            $table->string('mobile','100')->nullable();
            $table->date('date_of_birth')->nullable();//date of birth
            $table->date('date_of_graduation')->nullable();//date of graduation university
            $table->date('date_of_aniversary')->nullable();//date of married
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->enum('marital_status', ['Soltero', 'Casado','Viudo','Divorsiado'])->nullable();
            $table->boolean('is_alive')->default(true);
            //TODO: Fix multiple specialties and academic record historial
            //$table->string('regional_council',100)->nullable();//Regional Council
            //$table->string('specialty_code',10)->nullable();//specialty code RNE
            //$table->string('specialty_type',10)->nullable();//specialty type like RNE
            //$table->date('date_of_specialty')->nullable();//date of graduation specialty
            $table->text('description')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
