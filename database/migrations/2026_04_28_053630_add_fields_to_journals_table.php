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
        Schema::table('journals', function (Blueprint $table) {

            // 🔥 yangi ustunlar
            $table->string('e_issn')->nullable()->after('file_path');

            $table->text('description_uz')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_kr')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('journals', function (Blueprint $table) {

            $table->dropColumn([
                'e_issn',
                'description_uz',
                'description_ru',
                'description_en',
                'description_kr'
            ]);

        });
    }
};
