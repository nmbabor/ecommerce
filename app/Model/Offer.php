<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table='offers';
    protected $fillable=['fk_item_id','discount','status','regular_price','sale_price','start_date','end_date','offer_type'];
}
