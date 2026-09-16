<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private string $slug = 'hududiy-ozgarishlar';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $exists = DB::table('categories')->where('slug_uz', $this->slug)->exists();

        if (!$exists) {
            DB::table('categories')->insert([
                'name_uz' => 'Hududiy o\'zgarishlar',
                'name_ru' => 'Региональные изменения',
                'name_en' => 'Regional changes',
                'name_kr' => 'Ҳудудий ўзгаришлар',
                'slug_uz' => $this->slug,
                'slug_ru' => $this->slug,
                'slug_en' => $this->slug,
                'slug_kr' => $this->slug,
                'object_type' => 'news',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')->where('slug_uz', $this->slug)->where('object_type', 'news')->delete();
    }
};
