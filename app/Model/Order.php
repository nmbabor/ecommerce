<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=['address','country','region','fk_user_id','invoice_id','total_amount','payment_method','cart','status','delivered_by','date_time','delivery','ref_id'];
}
