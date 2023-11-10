<?php

use App\Models\EloquentModels\City;
use App\Models\EloquentModels\Country;
use App\Models\EloquentModels\Province;
use App\Models\EloquentModels\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'created_by');
            $table->foreignIdFor(Country::class);
            $table->foreignIdFor(Province::class);
            $table->foreignIdFor(City::class, 'created_by')->nullable();
            $table->string('title')->index();
            $table->string('slug')->index();
            $table->point('coordinate')->nullable()->spatialIndex('coordinate');
            $table->decimal('longitude')->nullable()->index();
            $table->decimal('latitude')->nullable()->index();
            $table->text('about')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
