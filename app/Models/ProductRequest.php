<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;

    protected $table = 'ProductRequest';

    protected $primaryKey = "id";

    protected $fillable = [
        "id",
        "product_id",
        "product_name",
        "supplier_name",
        "quantity",
        "date",
        "status"
    ];
}
