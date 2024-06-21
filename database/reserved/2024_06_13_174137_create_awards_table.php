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
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('restaurant_id');
            $table->string('reward_type');
            $table->text('reward_description');
            $table->string('reward_value');
            $table->decimal('minimum_order_value', 8, 2);
            $table->date('expiration_date')->nullable();
            $table->integer('redemption_limit')->nullable();
            $table->string('reward_status');
            $table->timestamps();

        // Foreign key constraint for the restaurant_id field
        $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('awards', function (Blueprint $table) {
    $table->dropForeign('awards_restaurant_id_foreign');
        
    });
    Schema::dropIfExists('awards');
    Schema::dropIfExists('restaurants');
}
};
