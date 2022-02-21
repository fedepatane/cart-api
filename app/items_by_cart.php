<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items_by_cart extends Model
{
    protected $fillable = ["product_id", "cart_id", "quantity", "unit_price"];

}
