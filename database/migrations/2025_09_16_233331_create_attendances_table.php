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
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_participant_id');
            $table->boolean('attended')->default(false);
            $table->dateTime('checked_in_at')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('applicant_participant_id')
                ->references('id')
                ->on('applicant_participant')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
