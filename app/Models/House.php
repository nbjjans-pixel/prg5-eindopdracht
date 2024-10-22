<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

//    protected $fillable = [
//        'title',
//        'description',
//        'price',
//        'type',
//        'status',
//        'location',
//        'image',
//    ];
}

