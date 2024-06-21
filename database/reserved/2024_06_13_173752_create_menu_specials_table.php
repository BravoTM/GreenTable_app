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
        Schema::create('menu_specials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
        $table->foreign('restaurant_id')->references('id')->on('restaurants');
        $table->string('name'); // Special name
        $table->text('description'); // Description
        $table->decimal('price', 8, 2); // Price
        $table->string('availability'); // Availability (e.g. Monday only)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('menu_specials', function (Blueprint $table) {
        $table->dropForeign('menu_specials_restaurant_id_foreign');
        
    });
    Schema::dropIfExists('menu_specials');
    Schema::dropIfExists('restaurants');
}
};
