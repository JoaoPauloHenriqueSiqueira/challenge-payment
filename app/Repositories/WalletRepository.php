<?php

namespace App\Repositories;

use App\Models\Wallet;
use App\Repositories\Contracts\WalletRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;

class WalletRepository extends BaseRepository implements WalletRepositoryInterface
{
    public function model()
    {
        return Wallet::class;
    }
}
