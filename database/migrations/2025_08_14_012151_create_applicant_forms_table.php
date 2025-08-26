<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applicant_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_id');
            $table->string('user_presentation')->nullable();
            $table->string('photo')->nullable();
            $table->string('teacher_wellbeing')->nullable();
            $table->string('academic_title')->nullable();
            $table->string('exp')->nullable();
            $table->json('selected_audiences')->nullable();
            $table->string('participation_type')->nullable();
            $table->string('title')->nullable();
            $table->text('abstract')->nullable();
            $table->text('description')->nullable();
            $table->text('sources')->nullable();
            $table->timestamps();

            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applicant_forms');
    }
};
