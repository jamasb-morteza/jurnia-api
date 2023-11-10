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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 32)->nullable();
            $table->string('last_name', 32)->nullable()->index();
            $table->string('nickname', 32)->nullable()->index();
            $table->string('username', 32)->nullable()->unique()->index();
            $table->string('mobile_number', 16)->nullable()->unique()->index(); //+98 938 220 8977   +1 938 220 8977
            $table->string('email', 255)->nullable()->unique()->index();
            $table->string('email_ignore_free_loader', 255)->nullable()->unique()->index();
            $table->string('gender', 32)->nullable()->index();
            $table->string('password', 64)->nullable();
            $table->dateTime('birth_date')->nullable()->index();
            $table->timestamp('verified_at')->nullable()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
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
