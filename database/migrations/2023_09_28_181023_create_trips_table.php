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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\EloquentModels\User::class, 'created_by');
            $table->foreignIdFor(\App\Models\EloquentModels\Tour::class);
            $table->foreignIdFor(\App\Models\EloquentModels\City::class);
            $table->string('title');
            $table->string('slug');
            $table->text('about')->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
