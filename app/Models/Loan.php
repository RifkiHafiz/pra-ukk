<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_code',
        'borrower_id',
        'staff_id',
        'item_id',
        'quantity',
        'loan_date',
        'return_date',
        'notes',
        'status',
    ];
}
