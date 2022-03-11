<?php

namespace App\Services\External;

use App\Services\External\Contract\RequestContract;

class NotifyTransactionService extends RequestContract
{
    private $url;

    public function __construct()
    {
        $this->url = env('NOTIFY_TRANSACTION');
    }

    public function sendMessage($data)
    {
        try {
            $response = $this->request('POST', $this->url, $data);

            if ($response instanceof \Exception) {
                throw $response;
            }

            return $response;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
