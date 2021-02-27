<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



    public function codes()
    {
        return $this->hasMany(Code::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function purchasedCodes()
    {
        return $this->hasMany(Code::class)->whereNotNull('purchased_at');
    }

    
}
