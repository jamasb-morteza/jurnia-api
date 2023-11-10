<?php

use App\Models\EloquentModels\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Country::class);
            $table->string('title')->index();
            $table->string('slug')->index();
            $table->string('abbr', 5)->index();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
