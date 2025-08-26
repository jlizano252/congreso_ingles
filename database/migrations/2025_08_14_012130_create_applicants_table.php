<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();

            // Relación con usuario
            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users');

            // Información del formulario
            $table->string('user_presentation')->nullable();
            $table->string('photo')->nullable();
            $table->string('academic_title')->nullable();
            $table->string('exp')->nullable();
            $table->json('teacher_wellbeing')->nullable();
            $table->json('selected_audiences')->nullable();
            $table->string('participation_type')->nullable();
            $table->string('title')->nullable();
            $table->text('abstract')->nullable();
            $table->text('description')->nullable();
            $table->text('sources')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
