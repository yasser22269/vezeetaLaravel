<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = [];
    protected $table = 'feedbacks';

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
