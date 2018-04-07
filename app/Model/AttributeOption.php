<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    protected $table='attribute_option';
    protected $fillable=['name','fk_attribute_id','status','attribute_price'];
}
