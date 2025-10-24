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
        Schema::table('properties', function (Blueprint $table) {
            $table->text('highlights')->nullable()->after('address'); 
            $table->boolean('pets')->default(0)->after('highlights');
            $table->text('facilities')->nullable()->after('pets');
            $table->text('rules')->nullable()->after('facilities');
            $table->text('location')->nullable()->after('rules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn(['highlights', 'pets', 'facilities', 'rules', 'location']);
        });
    }
};
