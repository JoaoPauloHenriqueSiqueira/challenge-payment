<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['payer', 'payee', 'amount'];

    public function payer()
    {
        return $this->belongsTo(User::class);
    }

    public function payee()
    {
        return $this->belongsTo(User::class);
    }
}
