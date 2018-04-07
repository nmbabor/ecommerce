<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='brand';
    protected $fillable=['photo','name','status','serial_num','link'];
}
