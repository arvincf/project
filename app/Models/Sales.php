<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $primaryKey = "id";

    protected $fillable = [
        "customer_name",
        "product_name",
        "product_quantity",
        "date"
    ];
}
