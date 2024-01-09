<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coffeebeans extends Model
{
    use HasFactory;

    protected $table = 'coffeebeans';

    protected $primaryKey = "id";

    protected $fillable = [
        "coffee_name",
        "quantity",
        "supplier_name",
        "date"
    ];
}
