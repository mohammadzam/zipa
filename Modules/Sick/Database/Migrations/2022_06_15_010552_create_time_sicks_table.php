<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeSicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_sicks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sick_id')->constrained('sicks');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->date('date');
            $table->string('from');
            $table->string('to');
            $table->enum('is_payed', ['true', 'false'])->default('false');
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
        Schema::dropIfExists('time_sicks');
    }
}
