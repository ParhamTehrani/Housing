<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    public function owners()
    {
        return $this->belongsToMany(Owner::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
