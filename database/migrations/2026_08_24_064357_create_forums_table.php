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
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->string('label_uz');
            $table->string('label_ru');
            $table->string('label_en');
            $table->string('label_kr');
            $table->string('theme_uz');
            $table->string('theme_ru');
            $table->string('theme_en');
            $table->string('theme_kr');
            $table->text('description_uz');
            $table->text('description_ru');
            $table->text('description_en');
            $table->text('description_kr');
            $table->text('stats_uz')->nullable();
            $table->text('stats_ru')->nullable();
            $table->text('stats_en')->nullable();
            $table->text('stats_kr')->nullable();
            $table->date('event_start_date');
            $table->date('event_end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forums');
    }
};
