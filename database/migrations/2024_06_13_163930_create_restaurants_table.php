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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        $table->string('address');
        $table->string('phone_number');
        $table->string('website');
        $table->json('categories'); // Categories (e.g. Italian, Chinese, Mexican, etc.)
        $table->text('description');
        $table->json('hours_of_operation'); // Hours of operation
        $table->string('average_price_range');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
