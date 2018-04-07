<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalesSupport extends Model
{
    protected $table='sales_support';
    protected $fillable=['title','link','status','serial_num','sub_title'];
}
