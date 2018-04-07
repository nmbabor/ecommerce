<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemExtensionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_extension_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_item_extension_lookup_id')->unsigned();
            $table->integer('fk_item_id')->unsigned();
            $table->string('title');
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
        Schema::drop('item_extension_details');
    }
}
