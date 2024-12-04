<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->integer('user_id')->nullable(); // Người dùng đặt hàng
            $table->string('order_number')->unique(); // Số đơn hàng duy nhất
            $table->decimal('total_amount', 10, 2); // Tổng số tiền
            $table->string('status')->default('pending'); // Trạng thái đơn hàng (pending, completed, cancelled, etc.)
            $table->text('shipping_address'); // Địa chỉ giao hàng
            $table->text('billing_address')->nullable(); // Địa chỉ thanh toán (nếu khác)
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
