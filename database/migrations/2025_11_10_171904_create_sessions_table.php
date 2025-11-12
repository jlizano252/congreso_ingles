<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('applicant_forms_id')->constrained()->cascadeOnDelete();
            $table->foreignId('room_id')->constrained()->cascadeOnDelete();

            $table->date('date'); // 2025-11-27
            $table->time('start_time'); // 09:15:00
            $table->time('end_time');   // 10:40:00

            $table->integer('capacity'); // cupos de esa sesión

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
