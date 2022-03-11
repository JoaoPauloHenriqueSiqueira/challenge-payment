<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wallet\DepositRequest;
use App\Services\WalletService;

class WalletController extends Controller
{
    protected $service;

    public function __construct(WalletService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        return $this->service->showMyWallet();
    }

    public function deposit(DepositRequest $request)
    {
        return $this->service->depositMyAccount($request);
    }
}
