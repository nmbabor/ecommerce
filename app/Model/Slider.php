<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
	protected $table='sliders';
    protected $fillable=['slide_photo','slide_caption','status','serial_num','fk_category_id','bottom_caption','top_caption'];
}
