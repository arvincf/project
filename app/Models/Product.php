<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $primaryKey = "id";

    protected $fillable = [
        "name",
        "supplier_name",
        "quantity",
        "unit_price",
        "details",
        "date_of_storing"
    ];
}
