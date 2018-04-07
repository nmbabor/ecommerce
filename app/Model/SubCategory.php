<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table='sub_category';
    protected $fillable=['sub_category_name','fk_category_id','status','serial_num','link','home_tag'];
}
