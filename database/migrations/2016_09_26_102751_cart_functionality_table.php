<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartFunctionalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('cart_functionality', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('fk_attribute_id')->unsigned();
            $table->integer('fk_category_id')->unsigned();
            $table->tinyInteger('status')->default(1);
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
        Schema::drop('cart_functionality');
    }
}
