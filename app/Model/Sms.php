<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $table='sms';
    protected $fillable=['number','message','status','message_id','error'];
}
