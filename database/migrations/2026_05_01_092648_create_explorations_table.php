<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('explorations', function (Blueprint $table) {
            $table->id();

            // NAME
            $table->string('name_uz');
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_kr')->nullable();

            // MAQSADI
            $table->text('purpose_uz')->nullable();
            $table->text('purpose_ru')->nullable();
            $table->text('purpose_en')->nullable();
            $table->text('purpose_kr')->nullable();

            // VAZIFALARI
            $table->text('tasks_uz')->nullable();
            $table->text('tasks_ru')->nullable();
            $table->text('tasks_en')->nullable();
            $table->text('tasks_kr')->nullable();

            // KUTILAYOTGAN NATIJALAR
            $table->text('expected_results_uz')->nullable();
            $table->text('expected_results_ru')->nullable();
            $table->text('expected_results_en')->nullable();
            $table->text('expected_results_kr')->nullable();

            // LOYIHA RAHBARI
            $table->string('leader_uz')->nullable();
            $table->string('leader_ru')->nullable();
            $table->string('leader_en')->nullable();
            $table->string('leader_kr')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('explorations');
    }
};
