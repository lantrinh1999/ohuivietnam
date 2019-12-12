<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_value', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attribute_id')->nullable()->unsigned();
            $table->string('name', 100);
            $table->string('slug', 100)->unique();
            $table->string('value', 100)->nullable()->default(null);
            $table->timestamps();
            $table->foreign('attribute_id')
                ->references('id')->on('attribute')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_value');
    }
}
