<?php

namespace Tests\Feature;

use App\Services\External\AuthorizationTransactionService;
use Tests\TestCase;

class AuthorizationPaymentTransactionTest extends TestCase
{
    private $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new AuthorizationTransactionService();
    }

    public function test_consult_integration_test()
    {
        $response = $this->service->consult();
        $this->arrayHasKey("message", $response);
    }
}
