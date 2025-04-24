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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_uz')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_kr')->nullable();
            $table->string('slug_uz')->nullable();
            $table->string('slug_ru')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_kr')->nullable();
            $table->string('object_type'); // Kategoriya qaysi obyektga tegishli ('journal', 'book', 'article' va h.k.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
