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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_item_id');
        $table->foreign('menu_item_id')->references('id')->on('menu_items');
        $table->integer('quantity');
        $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('order_items', function (Blueprint $table) {
    $table->dropForeign('order_items_menu_item_id_foreign');

    });
    Schema::dropIfExists('order_items');
    Schema::dropIfExists('menu_items');

}
};
