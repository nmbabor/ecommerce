<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->integer('fk_user_id')->unsigned();
            $table->string('invoice_id');
            $table->string('total_amount');
            $table->string('payment_option');
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
        Schema::drop('order');
    }
}
