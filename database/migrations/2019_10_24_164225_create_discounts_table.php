<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',191)->unique();
            $table->string('description')->nullable();
            $table->integer('value')->nullable();
            $table->string('type',191)->comment('percent,total');
            $table->date('date_end')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0:hết hạn,1 còn hạn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
