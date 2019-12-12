<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEarnPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earn_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key_code',191);
            $table->string('title',191)->nullable();
            $table->string('image',191)->nullable();
            $table->integer('point');
            $table->integer('unit')->comment('-1 : sẽ dùng mãi mãi , còn lại sẽ là số lần có thể dùng được'); 
            $table->tinyInteger('status')->nullable()->comment('-1 : còn hạn, 1 : hết hạn');
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
        Schema::dropIfExists('earn_points');
    }
}
