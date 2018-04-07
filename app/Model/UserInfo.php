<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table='user_info';
    protected $fillable=['fk_user_id','country','address','region']; 
}
