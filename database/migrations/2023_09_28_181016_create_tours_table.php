<?php

use App\Models\EloquentModels\Agency;
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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'created_by');;
            $table->foreignIdFor(Agency::class);
            $table->string('title')->index();
            $table->string('slug')->index();
            $table->text('about')->nullable();
            $table->longText('description')->nullable();
            $table->string('status', 32)->nullable()->index();
            $table->dateTime('start_date')->index()->nullable();
            $table->dateTime('end_date')->index()->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('agency_id')->references('id')->on('agencies');
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
