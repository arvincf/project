<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffeebeans extends Model
{
    use HasFactory;

    protected $table = 'coffeebeans';

    protected $primaryKey = "id";

    protected $fillable = [
        "coffee_name",
        "supplier_name",
        "quantity",
        "date"
    ];
}
