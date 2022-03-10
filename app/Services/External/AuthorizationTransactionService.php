<?php

namespace App\Services\External;

use App\Services\External\Contract\RequestContract;

class AuthorizationTransactionService extends RequestContract
{
    private $url;

    public function __construct()
    {
        $this->url = env('AUTHORIZATION_TRANSACTION');
    }

    public function consult()
    {
        try {
            $response = $this->request('GET', $this->url);

            if ($response instanceof \Exception) {
                throw $response;
            }
            return $response;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
