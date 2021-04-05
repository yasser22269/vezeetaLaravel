<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [ 'slug', 'is_active','name'];

    protected $casts = [
        'is_active' => 'boolean',
   ];

   public function getactive(){
       return $this->is_active ==0 ? 'غير مفعل' : "مفعل";
   }

      public function scopeactive($query){
    return $query->where('is_active',1) ;
    }
    public function product()
    {
        return $this->belongsToMany(Product::class,'category_products');
    }
    public function doctor()
    {
        return $this->hasMany(Doctor::class,'category_id');
    }

}
