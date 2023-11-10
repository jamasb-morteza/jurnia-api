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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\EloquentModels\User::class, 'created_by');;
            $table->foreignIdFor(\App\Models\EloquentModels\Agency::class);
            $table->string('title')->index();
            $table->string('slug')->index();
            $table->text('about')->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('start_date')->index()->nullable();
            $table->dateTime('end_date')->index()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
