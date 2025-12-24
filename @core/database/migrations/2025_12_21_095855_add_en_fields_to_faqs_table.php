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
        Schema::table('faqs', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->text('description_en')->nullable()->after('description');
        });

        // خلي الإنجليزي = العربي مبدئياً لحد ما تعدّل يدوي من لوحة التحكم
        DB::table('faqs')->update([
            'title_en'       => DB::raw('title'),
            'description_en' => DB::raw('description'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
                  $table->dropColumn(['title_en', 'description_en']);
        });
    }
};
