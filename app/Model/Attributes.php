<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $table='attributes';
    protected $fillable=['name','attribute_type','fk_category_id','fk_subcategory_id','fk_sub_sub_category_id','status','required','max','min'];
}
