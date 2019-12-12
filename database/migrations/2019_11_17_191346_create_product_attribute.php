<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 50)->nullable()->default(null);
            $table->bigInteger('product_id')->nullable()->unsigned();
            $table->bigInteger('attribute_id')->nullable()->unsigned();
            $table->bigInteger('value_id')->nullable()->unsigned();
            $table->tinyInteger('status')->nullable();
            $table->decimal('regular_price', 13, 2)->nullable()->default(0);
            $table->decimal('sale_price', 13, 2)->nullable()->default(0);
            $table->string('image', 191)->nullable()->default(null);
            $table->timestamps();
            $table->foreign('attribute_id')
                ->references('id')->on('attribute')->onDelete('cascade');
            $table->foreign('value_id')
                ->references('id')->on('attribute_value')->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id')->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute');
    }
}
