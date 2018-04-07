<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table='order_item';
    protected $fillable=['fk_order_id','fk_item_id','qty','amount','attributes','package'];
}
