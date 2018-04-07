<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SmsConfig extends Model
{
    protected $table='sms_config';
    protected $fillable=['sms_quantity','order_response','order_sms'];
}
