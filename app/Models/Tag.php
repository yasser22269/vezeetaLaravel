<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Tag extends Model
{

    protected $fillable = ['slug','is_active',"name"];


    public function getActive(){
        return  $this -> is_active  == 0 ?  'غير مفعل'   : 'مفعل' ;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'tag_products');
    }
}
