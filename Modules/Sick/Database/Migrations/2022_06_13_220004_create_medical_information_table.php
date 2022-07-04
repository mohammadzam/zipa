<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sick_id')->constrained('sicks');
            $table->foreignId('section_id')->constrained('sections');
            $table->foreignId('doctor_id')->nullable()->constrained('doctors');
            $table->enum('status',['InBed','WasHospitalized','RequestForHospitalization','DischargeFromTheHospital'])->default('RequestForHospitalization');
            $table->enum('is_payed', ['true', 'false'])->default('false');
            $table->string('disease');
            $table->string('treatment');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_information');
    }
}
