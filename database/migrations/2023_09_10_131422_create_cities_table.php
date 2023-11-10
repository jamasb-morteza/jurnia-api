<?php

use App\Models\EloquentModels\Country;
use App\Models\EloquentModels\Province;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Country::class);
            $table->foreignIdFor(Province::class);
            $table->string('title')->index();
            $table->string('slug')->index();
            $table->string('abbr', 5)->index();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('province_id')->references('id')->on('provinces');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
