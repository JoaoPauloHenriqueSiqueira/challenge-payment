<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Contracts\TransactionRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class TransactionRepository extends BaseRepository implements TransactionRepositoryInterface
{
    public function model()
    {
        return Transaction::class;
    }
}
