<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table='reviews';
    protected $fillable=['rating','comment','fk_user_id','status','updated_data','fk_item_id'];
}
