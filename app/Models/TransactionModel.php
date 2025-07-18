<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'id_transaction';
    protected $fillable = ['transaction_type', 'amount', 'description'];
}
