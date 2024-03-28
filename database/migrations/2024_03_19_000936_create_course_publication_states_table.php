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
        Schema::create('course_publication_states', function (Blueprint $table) {
            $table->id();
            $table->boolean('publishable')->default(false);
            $table->boolean('curriculum_compass')->default(false);
            $table->boolean('has_description')->default(false);
            $table->boolean('has_course_image')->default(false);
            $table->boolean('has_promotional_video')->default(false);
            $table->boolean('is_free')->default(false);
            $table->boolean('has_price')->default(false);
            $table->boolean('has_congratulations_message')->default(false);
            $table->boolean('has_welcome_message')->default(false);
            $table->foreignId('course_setting_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_publication_states');
    }
};
