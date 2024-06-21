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
        Schema::create('user_favorite_restaurants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->timestamps();
        });
    
        Schema::create('user_favorite_cuisine_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('cuisine_type_id');
            $table->foreign('cuisine_type_id')->references('id')->on('cuisine_types');
            $table->timestamps();
        });
    
        Schema::create('user_dietary_restrictions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('dietary_restriction_id');
            $table->foreign('dietary_restriction_id')->references('id')->on('dietary_restrictions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('user_favorite_restaurants', function (Blueprint $table) {
        $table->dropForeign('user_favorite_restaurants_restaurant_id_foreign');
        $table->dropForeign('user_favorite_restaurants_user_id_foreign');
    });
    Schema::table('user_favorite_cuisine_types', function (Blueprint $table) {
        $table->dropForeign('user_favorite_cuisine_types_user_id_foreign');
        $table->dropForeign('user_favorite_cuisine_types_cuisine_type_id_foreign');

    });
    Schema::table('user_dietary_restrictions', function (Blueprint $table) {
        $table->dropForeign('user_dietary_restrictions_user_id_foreign');
        $table->dropForeign('user_dietary_restrictions_dietary_restriction_id_foreign');
        

    });
    
    Schema::dropIfExists('user_favorite_restaurants');
    Schema::dropIfExists('user_favorite_cuisine_types');
    Schema::dropIfExists('user_dietary_restrictions');
    Schema::dropIfExists('cuisine_types');
    Schema::dropIfExists('users');
    Schema::dropIfExists('restaurants');
}
};
