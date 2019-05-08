<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('cat_id')->unsigned();
            $table->timestamps();

            $table->foreign('cat_id')
                  ->references('id')
                  ->on('cats')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcats');
    }
}
