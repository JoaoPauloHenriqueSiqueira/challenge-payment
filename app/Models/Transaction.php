<?php

namespace App\Models;

use App\Helpers\Format;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['payer', 'payee', 'amount'];

    public function payerUser()
    {
        return $this->belongsTo(User::class);
    }

    public function payeeUser()
    {
        return $this->belongsTo(User::class, 'payee');
    }

    public function getAmountFormatAttribute()
    {
        return Format::money($this->attributes['amount']);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y h:i:s');
    }
}
