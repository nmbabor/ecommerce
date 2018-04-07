<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeyConstraintsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_category', function($table)
        {
            $table->foreign('fk_category_id', 'FK_sub_category_category')->references('id')->on('category');
        });
        Schema::table('cart_functionality', function($table)
        {
            $table->foreign('fk_attribute_id', 'FK_cart_functionality_attributes')->references('id')->on('attributes');
        });

        Schema::table('cart_functionality_details', function($table)
                {
                    $table->foreign('fk_cart_functionality_id', 'FK_cart_functionality_details_cart_functionality')->references('id')->on('cart_functionality');
                });

        Schema::table('custom_order_details', function($table)
                        {
                            $table->foreign('fk_custom_order_title_id', 'FK_custom_order_details_custom_order_title')->references('id')->on('custom_order_title');
                        });

        Schema::table('items', function($table)
                        {
                            $table->foreign('fk_category_id', 'FK_items_category')->references('id')->on('category');

                            $table->foreign('fk_sub_category_id', 'FK_items_sub_category')->references('id')->on('sub_category');
                        });

        Schema::table('item_packages', function($table)
                        {
                            $table->foreign('fk_item_id', 'FK_item_packages_item')->references('id')->on('items');
                            
                        });

        Schema::table('item_extension_details', function($table)
                        {
                            $table->foreign('fk_item_extension_lookup_id', 'FK_item_extension_details_item_extension_lookup')->references('id')->on('item_extension_lookup');

                          
                            $table->foreign('fk_item_id', 'FK_item_extension_details_item')->references('id')->on('items');  
                        });

         Schema::table('order', function($table)
                        {
                            $table->foreign('fk_user_id', 'FK_order_user')->references('id')->on('users');
                            
                        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
