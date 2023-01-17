<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable =
        [
            'name',
            'number',
            'debit_balance',
            'credit_balance',
            'created_at'
        ];
}
