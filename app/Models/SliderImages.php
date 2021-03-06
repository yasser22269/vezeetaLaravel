<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SliderImages extends Model
{
    protected $guarded = [];

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('images/SliderImages/' . $val) : "";
    }
   public function category(){
    return $this->belongsTo(Category::class,'category_id');
    }



}
