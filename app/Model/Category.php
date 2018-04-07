<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table='category';
   protected $fillable=['category_name','serial_num','status','photo','photo_status','home_status','link','icon_class','home_tag'];
}
