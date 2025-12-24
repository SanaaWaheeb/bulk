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
        Schema::table('blogs', function (Blueprint $table) {
       
            $table->string('title_en')->nullable()->after('title');
            $table->longText('blog_content_en')->nullable()->after('blog_content');
            $table->string('author_en')->nullable()->after('author');
            $table->text('excerpt_en')->nullable()->after('excerpt');
        });

        DB::table('blogs')->update([
            'title_en'         => DB::raw('title'),
            'blog_content_en'  => DB::raw('blog_content'),
            'author_en'        => DB::raw('author'),
            'excerpt_en'       => DB::raw('excerpt'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'title_en',
                'blog_content_en',
                'author_en',
                'excerpt_en',
            ]);    });
    }
};
