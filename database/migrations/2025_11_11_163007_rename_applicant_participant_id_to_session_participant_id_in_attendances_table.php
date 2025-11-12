<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            // Si existe la vieja FK, la eliminamos
            $table->dropForeign(['applicant_participant_id']);
            $table->dropColumn('applicant_participant_id');

            // Creamos la nueva relación
            $table->foreignId('session_participant_id')
                ->constrained('session_participant')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['session_participant_id']);
            $table->dropColumn('session_participant_id');

            $table->foreignId('applicant_participant_id')
                ->constrained('applicant_participant')
                ->onDelete('cascade');
        });
    }
};
