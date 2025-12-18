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
                $table->integer('market_price')->nullable()->after('price');
            //
        });
         DB::table('causes')->update([
            'market_price' => DB::raw('price')
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('causes', function (Blueprint $table) {
               $table->dropColumn('market_price');
            //
        });
    }
};
