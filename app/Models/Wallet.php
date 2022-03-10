<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uuid = Uuid::uuid4();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
