<?php

use App\Models\EloquentModels\City;
use App\Models\EloquentModels\Tour;
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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'created_by');
            $table->foreignIdFor(Tour::class);
            $table->foreignIdFor(City::class, 'src_city_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('about')->nullable();
            $table->longText('description')->nullable();
            $table->string('status', 32)->nullable()->index();
            $table->dateTime('start_date')->nullable()->index();
            $table->dateTime('end_date')->nullable()->index();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('tour_id')->references('id')->on('tours');
            $table->foreign('src_city_id')->references('id')->on('cities');
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
