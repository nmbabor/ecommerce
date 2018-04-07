<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AboutCompany extends Model
{
    protected $table='about_company';
    protected $fillable=['company_name','logo','short_description','description','address','mobile_no','email','currency_symbol','doorstep','pick_up_station','meta_keywords'];
}
