<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('image_url');
            $table->string('title');
            $table->string('highlight');
            $table->text('subtitle');
            $table->string('btn1_text')->default('Get Free Consultation');
            $table->string('btn1_link')->default('#contact');
            $table->string('btn2_text')->default('Explore Services');
            $table->string('btn2_link')->default('#services');
            $table->integer('sort_order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->default('🌍');
            $table->string('title');
            $table->text('description');
            $table->integer('sort_order')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->string('label');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('visa_type');
            $table->text('content');
            $table->string('flag')->default('🌍');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('why_us_points', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->default('✓');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
        Schema::dropIfExists('services');
        Schema::dropIfExists('stats');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('why_us_points');
        Schema::dropIfExists('site_settings');
    }
};
