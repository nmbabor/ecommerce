<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table='work';
    protected $fillable=['photo','status','title','description','link','type'];
}
