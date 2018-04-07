<?php

namespace App\MOdel;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    protected $table='sub_sub_category';
    protected $fillable=['fk_sub_category_id','sub_name','link','serial_num','status'];
}
