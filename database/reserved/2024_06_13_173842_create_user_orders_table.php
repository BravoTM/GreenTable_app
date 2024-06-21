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
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->id();
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->datetime('order_date');
        $table->unsignedBigInteger('restaurant_id');
        $table->foreign('restaurant_id')->references('id')->on('restaurants');
        $table->decimal('total_price', 10, 2);
        $table->string('order_status'); // e.g. pending, delivered, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('user_orders', function (Blueprint $table) {
        $table->dropForeign('user_orders_user_id_foreign');
    $table->dropForeign('user_orders_restaurant_id_foreign');
        
    });
    Schema::dropIfExists('user_orders');
    Schema::dropIfExists('users');
    Schema::dropIfExists('restaurants');
}
};
