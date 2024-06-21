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
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->unsignedBigInteger('menu_item_id');
        $table->foreign('menu_item_id')->references('id')->on('menu_items');
        $table->integer('rating'); // Rating (e.g. 1-5 stars)
        $table->text('review_text'); // Review text
        $table->dateTime('date_posted'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('user_reviews', function (Blueprint $table) {
        $table->dropForeign('user_reviews_user_id_foreign');
        $table->dropForeign('user_reviews_menu_item_id_foreign');
    });
    Schema::dropIfExists('user_reviews');
    Schema::dropIfExists('menu_items');
    Schema::dropIfExists('users');

}
};
