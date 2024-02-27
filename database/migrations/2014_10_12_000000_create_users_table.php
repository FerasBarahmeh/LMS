<?php

use App\Enums\NotifyThrough;
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

            $table->string('name', 255);
            $table->string('first_name', 127)->nullable();
            $table->string('last_name', 127)->nullable();
            $table->string('username', 30)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 10)->nullable();


            $table->enum('privilege', Privileges::values())
                ->default(Privileges::Student->value);

            $table->enum('status', Status::values())
                ->default(Status::Active->value);

            $table->enum('theme', Theme::values())
                ->default(Theme::Light->value);

            $table->enum('notify_through', NotifyThrough::values())
                ->default(NotifyThrough::Mail->value);

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
