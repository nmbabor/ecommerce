<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table='team';
    protected $fillable=['name','photo','designation','serial_num','address','email','status','description','type'];
}
