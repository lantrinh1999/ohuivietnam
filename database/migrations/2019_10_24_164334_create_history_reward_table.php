<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryRewardTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('history_reward', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->integer('point')->default(0);
            $table->string('action', 191)->nullable();
            $table->tinyInteger('status')->comment('1 :Đã duyệt,0:Chưa duyệt');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('history_reward');
    }
}
