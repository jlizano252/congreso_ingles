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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_participant_id'); // referencia a la tabla pivote
            $table->boolean('attended')->default(false);
            $table->timestamp('checked_in_at')->nullable();
            $table->timestamps();

            $table->foreign('applicant_participant_id')
                ->references('id')
                ->on('applicant_participant')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
};
