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
        Schema::table('announcements', function (Blueprint $table) {
            $table->string('title_uz')->nullable()->after('id');
            $table->string('title_ru')->nullable()->after('title_uz');
            $table->string('title_en')->nullable()->after('title_ru');
            $table->string('title_kr')->nullable()->after('title_en');
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->renameColumn('text_uz', 'description_uz');
            $table->renameColumn('text_ru', 'description_ru');
            $table->renameColumn('text_en', 'description_en');
            $table->renameColumn('text_kr', 'description_kr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->renameColumn('description_uz', 'text_uz');
            $table->renameColumn('description_ru', 'text_ru');
            $table->renameColumn('description_en', 'text_en');
            $table->renameColumn('description_kr', 'text_kr');
        });

        Schema::table('announcements', function (Blueprint $table) {
            $table->dropColumn(['title_uz', 'title_ru', 'title_en', 'title_kr']);
        });
    }
};
