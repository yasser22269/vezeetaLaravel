<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageDoctor extends Model
{
    protected $guarded =[];


    public function getPhotoAttribute($val)
    {

        return $val ? asset('images/doctorsclinic/'.$val) : '';
    }

}
