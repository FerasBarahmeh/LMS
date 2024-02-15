<?php

use App\Enums\Privileges;
use App\Enums\Status;
use App\Enums\Theme;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->enum('privilege', [Privileges::Admin->value, Privileges::Instructor->value, Privileges::Student->value])
                ->default(Privileges::Student->value);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', [Status::Active->value, Status::InActive->value])
                ->default(Status::Active->value);

            $table->enum('theme', [Theme::Dim->value, Theme::Light->value])
                ->default(Theme::Light->value);


            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
