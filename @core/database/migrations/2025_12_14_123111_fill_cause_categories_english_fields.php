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
        // Copy Arabic title/description into English columns IF English is empty
        DB::table('cause_categories')
            ->whereNull('title_en')
            ->orWhere('title_en', '')
            ->update([
                'title_en' => DB::raw('title'),
            ]);

        DB::table('cause_categories')
            ->whereNull('description_en')
            ->orWhere('description_en', '')
            ->update([
                'description_en' => DB::raw('description'),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // Optional: you can clear EN fields again on rollback if you want
        DB::table('cause_categories')->update([
            'title_en' => null,
            'description_en' => null,
        ]);
    }
    
};
