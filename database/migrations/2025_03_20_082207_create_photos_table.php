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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('file_path'); // Rasm fayl yo'li
            $table->string('model_type'); // Rasm tegishli bo'lgan model turi (masalan, Product)
            $table->unsignedBigInteger('model_id'); // Model ID'si
            $table->timestamps();

            $table->index(['model_type', 'model_id']); // model_type va model_id ustunlariga indeks qo'shish
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
