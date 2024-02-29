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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->enum('semester', \App\Enums\Semesters::values());
            $table->text('description')->nullable();
            $table->decimal('price')->default(0);
            $table->boolean('is_free')->default(true);
            $table->unsignedInteger('enrollment_number')->default(0);
            $table->string('congratulations_message')->nullable();
            $table->string('welcome_message')->nullable();
            $table->foreignId('academic_subject_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
