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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            // Website / Brand
            $table->string('site_name')->nullable();
            $table->string('site_tagline')->nullable();

            // Footer
            $table->text('footer_description')->nullable();
            $table->string('footer_navigate_title')->nullable();
            $table->string('footer_visit_title')->nullable();

            // Contact
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Copyright
            $table->string('copyright_text')->nullable();

            // Optional social links
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
