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
        Schema::create('home_settings', function (Blueprint $table) {
        $table->id();

        $table->string('hero_location')->nullable();
        $table->string('hero_title')->nullable();
        $table->text('hero_description')->nullable();
        $table->string('hero_image')->nullable();

        $table->decimal('rating', 2, 1)->default(4.4);
        $table->string('rating_text')->nullable();

        $table->string('highlights_tag')->nullable();
        $table->string('highlights_title')->nullable();

        $table->string('highlight_1_title')->nullable();
        $table->text('highlight_1_description')->nullable();

        $table->string('highlight_2_title')->nullable();
        $table->text('highlight_2_description')->nullable();

        $table->string('highlight_3_title')->nullable();
        $table->text('highlight_3_description')->nullable();

        $table->string('rooms_tag')->nullable();
        $table->string('rooms_title')->nullable();
        $table->text('rooms_description')->nullable();

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};
