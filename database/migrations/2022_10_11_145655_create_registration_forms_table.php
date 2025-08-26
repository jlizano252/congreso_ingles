<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->unsignedBigInteger('participant_id');
            $table->foreign('participant_id')->references('id')->on('participants');
            $table->string('accept')->default('si');
            $table->string('mep')->default('si');
            $table->unsignedBigInteger('appointment_id');
            $table->foreign('appointment_id')->references('id')->on('appointment_types');
            $table->integer('service_years')->default(0);
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('educational_regions');
            $table->string('region')->nullable();
            $table->string('institution');
            $table->string('address')->nullable();
            $table->string('auth_image')->default('si');
            $table->string('certificate')->default('si');
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
        Schema::dropIfExists('registration_forms');
    }
};
