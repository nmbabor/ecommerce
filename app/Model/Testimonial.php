<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table='testimonials';
    protected $fillable=['name','designation','description','photo','status'];
}
