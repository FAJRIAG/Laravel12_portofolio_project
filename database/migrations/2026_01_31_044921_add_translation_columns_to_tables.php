<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('title_id')->nullable()->after('title');
            $table->string('title_ja')->nullable()->after('title_id');
            $table->text('description_id')->nullable()->after('description');
            $table->text('description_ja')->nullable()->after('description_id');
        });

        Schema::table('abouts', function (Blueprint $table) {
            $table->string('page_title_id')->nullable()->after('page_title');
            $table->string('page_title_ja')->nullable()->after('page_title_id');
            $table->string('title_id')->nullable()->after('title');
            $table->string('title_ja')->nullable()->after('title_id');
            $table->text('description_id')->nullable()->after('description');
            $table->text('description_ja')->nullable()->after('description_id');
            $table->string('hero_title_id')->nullable()->after('hero_title');
            $table->string('hero_title_ja')->nullable()->after('hero_title_id');
            $table->text('hero_description_id')->nullable()->after('hero_description');
            $table->text('hero_description_ja')->nullable()->after('hero_description_id');
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->string('title_id')->nullable()->after('title');
            $table->string('title_ja')->nullable()->after('title_id');
            $table->string('issuer_id')->nullable()->after('issuer');
            $table->string('issuer_ja')->nullable()->after('issuer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['title_id', 'title_ja', 'description_id', 'description_ja']);
        });

        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
                'page_title_id',
                'page_title_ja',
                'title_id',
                'title_ja',
                'description_id',
                'description_ja',
                'hero_title_id',
                'hero_title_ja',
                'hero_description_id',
                'hero_description_ja'
            ]);
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn(['title_id', 'title_ja', 'issuer_id', 'issuer_ja']);
        });
    }
};
