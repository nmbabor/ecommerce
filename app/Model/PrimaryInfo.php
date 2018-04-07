<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PrimaryInfo extends Model
{
     protected $table='about_company';
    protected $fillable=['company_name','logo','address','mobile_no','email','short_description','description','map_embed','fb_link','favicon','currency_symbol','doorstep','pick_up_station','meta_keywords','bkash_no'];
}
