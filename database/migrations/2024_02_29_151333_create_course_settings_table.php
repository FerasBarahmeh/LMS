<?php

use App\Enums\Currency;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('published')->default(false);
            $table->enum('currency', Currency::values())->default(Currency::JOD->value);
            $table->foreignId('course_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_settings');
    }
};
