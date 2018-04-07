<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table='wishlist';
    protected $fillable=['fk_item_id','status','fk_user_id'];
}
