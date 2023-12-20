<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery';

    protected $primaryKey = "id";

    protected $fillable = [
        "supplier_name",
        "quantity",
        "product_name",
        "status",
        "delivery_date",
    ];
}
