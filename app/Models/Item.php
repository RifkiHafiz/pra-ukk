<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'item_code',
        'item_name',
        'total_quantity',
        'available_quantity',
        'item_image',
    ];
}
