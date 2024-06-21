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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Menu name (e.g. lunch, dinner, breakfast)
            $table->text('description'); // Menu description
            $table->timestamps();
        });
    
        Schema::create('menu_item_menu', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->unsignedBigInteger('menu_item_id');
            $table->foreign('menu_item_id')->references('id')->on('menu_items');
            $table->primary(['menu_id', ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('menu_item_menu', function (Blueprint $table) {
        $table->dropForeign('menu_item_menu_menu_id_foreign');
        $table->dropForeign('menu_item_menu_menu_item_id_foreign');

    });
    Schema::dropIfExists('menu_item_menu');
    Schema::dropIfExists('menus');
}
};
