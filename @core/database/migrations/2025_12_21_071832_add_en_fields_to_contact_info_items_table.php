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
      Schema::table('contact_info_items', function (Blueprint $table) {
           
            $table->string('title_en', 191)->nullable()->after('title');
            $table->text('description_en')->nullable()->after('description');
        });

       
        DB::table('contact_info_items')->update([
            'title_en'       => DB::raw('title'),
            'description_en' => DB::raw('description'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_info_items', function (Blueprint $table) {
              $table->dropColumn(['title_en', 'description_en']);
        });
    }
};
