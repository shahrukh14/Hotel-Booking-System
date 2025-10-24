<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('property_id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('cleanliness_rating')->nullable()->default(0);
            $table->integer('location_rating')->nullable()->default(0);
            $table->integer('service_rating')->nullable()->default(0);
            $table->integer('facilities_rating')->nullable()->default(0);
            $table->integer('value_for_money_rating')->nullable()->default(0);
            $table->decimal('final_rating', 6,1)->nullable()->default(0);
            $table->text('review')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
