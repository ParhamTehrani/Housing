<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table='address';
    protected $guarded=[];
    public function property()
    {
        return $this->hasOne(Property::class);
    }
}
