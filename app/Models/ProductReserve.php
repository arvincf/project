<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReserve extends Model
{
    use HasFactory;

    protected $table = 'reserveproducts';

    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "customer_name",
        "product_id",
        "product_name",
        "details",
        "quantity",
        "date",
        "status"
    ];
}
