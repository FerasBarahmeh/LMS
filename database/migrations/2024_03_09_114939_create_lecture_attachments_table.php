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
        Schema::create('lecture_attachments', function (Blueprint $table) {
            $table->id();
            $table->enum('type_attachment', \App\Enums\TypeAttachments::values());
            $table->string('url')->nullable();
            $table->foreignId('lecturer_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecture_attachments');
    }
};
