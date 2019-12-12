<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->bigInteger('account_id')->unsigned()->nullable();
            $table->text('note')->nullable()->default(null);
            $table->integer('payment_method')->comment('2 : Nhận hàng trước,1: Thanh toán online');
            $table->integer('payment_status')->comment('-1 : Chưa thanh toán ,1: Đã thanh toán');
            $table->bigInteger('discount_id')->unsigned()->nullable();
            $table->bigInteger('voucher_id')->unsigned()->nullable();
            $table->integer('total')->nullable();
            $table->tinyInteger('status')->comment('1: Chờ xác nhận hàng, 2: Đang giao hàng, -1: Đơn hàng bị hủy, 3: Đơn hàng thành công');
            $table->timestamps();
            $table->foreign('account_id')
                ->references('id')->on('accounts')
                ->onDelete('cascade');
            $table->foreign('discount_id')
                ->references('id')->on('discounts')
                ->onDelete('set null');
            $table->foreign('voucher_id')
                ->references('id')->on('vouchers')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
