<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->integer('fk_category_id')->unsigned();
            $table->integer('fk_sub_category_id')->unsigned()->default(nullable);
            $table->string('sale_price');
            $table->string('regular_price');
            $table->tinyInteger('is_extension');
            $table->tinyInteger('max_ext_qnty');
            $table->tinyInteger('min_ext_qnty');
            $table->tinyInteger('ext_price');
            $table->tinyInteger('has_package');
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
        Schema::drop('items');
    }
}
