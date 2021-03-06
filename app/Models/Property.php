<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded=[];
    protected $table='property';

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function address()
    {
        return $this->hasOne(Address::class);
    }

}
