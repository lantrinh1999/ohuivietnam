<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->tinyInteger('is_simple')->nullable()->default(1)->comment('1: sản phẩm đơn giản: -1: sản phẩm có biến thể');
            $table->text('description')->nullable()->default(null);
            $table->text('content')->nullable()->default(null);
            $table->decimal('regular_price', 13, 2)->nullable()->default(0);
            $table->decimal('sale_price', 13, 2)->nullable()->default(0);
            $table->tinyInteger('status')->nullable()->comment('1:còn hàng, -1: hết hàng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
