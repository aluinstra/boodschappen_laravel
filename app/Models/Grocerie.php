<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grocerie extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['subtotal_price'];

    public function getSubtotalPriceAttribute()
    {

        return $this->price * $this->quantity;
    }
}
