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
         Schema::table('header_sliders', function (Blueprint $table) {
            $table->string('title_en', 191)->nullable()->after('title');
            $table->string('subtitle_en', 191)->nullable()->after('subtitle');
            $table->text('description_en')->nullable()->after('description');
        });
          DB::table('header_sliders')->orderBy('id')->chunkById(100, function ($sliders) {
            foreach ($sliders as $slider) {
                DB::table('header_sliders')
                    ->where('id', $slider->id)
                    ->update([
                        'title_en'       => $slider->title,        // نفس العنوان العربي
                        'subtitle_en'    => $slider->subtitle,     // نفس العنوان الفرعي
                        'description_en' => $slider->description,  // نفس الوصف
                    ]);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('header_sliders', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'subtitle_en', 'description_en']);
        });

    }
};
