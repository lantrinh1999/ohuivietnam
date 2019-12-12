<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 191)->unique();
            $table->string('password')->nullable();
            $table->integer('point_reward')->default(0);
            $table->string('refferal_code', 191)->unique();
            $table->string('avatar', 191)->nullable();
            $table->tinyInteger('status')->default(-1);
            $table->integer('role')->default(1);
            $table->tinyInteger('use_refferal')->default(0)->comment('0: Chưa sử dụng mã giới thiệu,1: Đã sử dụng mã giới thiệu');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }

}
