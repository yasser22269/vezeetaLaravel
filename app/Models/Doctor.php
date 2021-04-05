<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use  SoftDeletes;


    protected $fillable = [
        'slug',
        'address',
        'price',
        'name',
        'short_description',
        'description',
        'is_active',
        'viewed',
        'avatar',
        "category_id"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */


    public function getAvatarAttribute($val)
    {

        return $val ? asset('images/doctors/'.$val) : '';
    }

    public function getActive()
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }
    public function scopeActive($query)
    {
        return $query->where('is_active',1) ;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'tag_doctors');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function Images()
    {
        return $this->hasMany(ImageDoctor::class,'doctor_id');
    }

    public function comments()
    {
        return $this->hasMany(Feedback::class,'doctor_id');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
