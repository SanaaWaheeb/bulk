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
        Schema::table('causes', function (Blueprint $table) {
            // محتوى إنجليزي
            if (!Schema::hasColumn('causes', 'cause_content_en')) {
                $table->longText('cause_content_en')->nullable()->after('cause_content');
            }

            // ملخص إنجليزي
            if (!Schema::hasColumn('causes', 'excerpt_en')) {
                $table->text('excerpt_en')->nullable()->after('excerpt');
            }

            // مواصفات إنجليزي (JSON)
            if (!Schema::hasColumn('causes', 'specifications_en')) {
                $table->json('specifications_en')->nullable()->after('specifications');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('causes', function (Blueprint $table) {
             if (Schema::hasColumn('causes', 'cause_content_en')) {
                $table->dropColumn('cause_content_en');
            }
            if (Schema::hasColumn('causes', 'excerpt_en')) {
                $table->dropColumn('excerpt_en');
            }
            if (Schema::hasColumn('causes', 'specifications_en')) {
                $table->dropColumn('specifications_en');
            }
        });
    }
};
