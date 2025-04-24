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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('address_uz')->nullable();
            $table->string('address_ru')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_kr')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('worktime');
            $table->string('youtube_link')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
