<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    protected $guarded = [];
    protected $casts = [
        'bookAvailable' => 'boolean',
    ];

    public function getBookAvailable()
    {
        return $this->bookAvailable == 0 ? ' محجوز' : 'غير محجوز';
    }

    public function scopeBookAvailable($query){
        return $query->where('BookAvailable',0) ; //محجوز
    }

    public function scopeNotBookAvailable($query){
        return $query->where('BookAvailable',1) ; //غير محجوز
    }

    public function doctors()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function patient()
    {
        return $this->belongsToMany(User::class,"appointments","doctor_id","user_id");
    }

}
