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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->datetime('order_date');
        $table->unsignedBigInteger('restaurant_id');
        $table->foreign('restaurant_id')->references('id')->on('restaurants');
        $table->decimal('total_price', 10, 2);
        $table->string('order_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('orders', function (Blueprint $table) {
    $table->dropForeign('orders_restaurant_id_foreign');
    });
    Schema::dropIfExists('orders');
    Schema::dropIfExists('restaurants');
}
};
