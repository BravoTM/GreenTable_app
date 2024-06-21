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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
        $table->foreign('category_id')->references('id')->on('menu_categories');
        $table->string('name'); // Item name
        $table->text('description'); // Description
        $table->decimal('price', 8, 2); // Price
        $table->text('photo'); // Photo
        $table->json('nutrition'); // Nutritional information (e.g. calories, fat, protein)
        $table->json('tags'); // Tags (e.g. vegetarian, gluten-free)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('menu_items', function (Blueprint $table) {
        
        $table->dropForeign('menu_items_cuisine_id_foreign');
    });
    Schema::dropIfExists('menu_items');
    Schema::dropIfExists('menu_categories');
    
}
};
