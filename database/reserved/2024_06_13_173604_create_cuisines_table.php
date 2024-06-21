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
        Schema::create('cuisines', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Cuisine name (e.g. Italian, Chinese, Mexican, Indian, etc.)
            $table->timestamps();
        });
        Schema::create('restaurant_cuisine', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->unsignedBigInteger('cuisine_id');
            $table->foreign('cuisine_id')->references('id')->on('cuisines');
            $table->primary(['restaurant_id', 'cuisine_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('restaurant_cuisine', function (Blueprint $table) {
        $table->dropForeign('restaurant_cuisine_restaurant_id_foreign');
        $table->dropForeign('restaurant_cuisine_cuisine_id_foreign');
    });
    Schema::dropIfExists('restaurant_cuisine');
    Schema::dropIfExists('cuisines');
    Schema::dropIfExists('restaurants');
}
};
