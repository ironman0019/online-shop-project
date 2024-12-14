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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('peyment_id')->constrained('peyments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('delivery_id')->constrained('deliveries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('coupan_id')->constrained('coupans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade')->onUpdate('cascade');
            $table->text('address_object');
            $table->text('peyment_object');
            $table->text('delivery_object');
            $table->tinyInteger('peyment_type')->default(0)->comment('0 => online, 1 => offline');
            $table->tinyInteger('peyment_status')->default(0)->comment('0 => pending, 1 => ok, 2 => faild');
            $table->unsignedBigInteger('delivery_amount')->nullable();
            $table->tinyInteger('delivery_status')->default(0)->comment('0 => pending, 2 => sent, 3 => recived, 4 => refund');
            $table->timestamp('delivery_date')->nullable();
            $table->unsignedBigInteger('order_final_amount');
            $table->unsignedBigInteger('order_discount_amount');
            $table->unsignedBigInteger('order_total_discount_amount');
            $table->tinyInteger('order_status')->default(0)->comment('0 => pending, 1 => in progress, 2 => ok, 3 => faild, 4 => refund');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
