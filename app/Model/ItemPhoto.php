<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemPhoto extends Model
{
    protected $table='item_photo';
    protected $fillable=['photo','fk_item_id','small_photo'];
}
