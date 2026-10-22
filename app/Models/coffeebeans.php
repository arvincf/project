<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeBeans extends Model
{
    use HasFactory;

    protected $table = 'CoffeeBeans';

    protected $primaryKey = "id";

    protected $fillable = [
        "coffee_name",
        "supplier_name",
        "quantity",
        "date"
    ];
}
