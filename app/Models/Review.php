<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    public function house()
    {
        //één review hoort bij één huis
        return $this->belongsTo(House::class);
    }

}
