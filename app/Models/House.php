<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    public function reviews()
    {
        //relatie tussen databases dat huis meerdere reviews kan hebben
        return $this->hasMany(Review::class);
    }

    public function favoritedBy()
    {
        //veel op veel relatie door tussen tabel 'favorties'
        return $this->belongsToMany(User::class, 'favorites');
    }
}

