<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\InteractsWithUsers;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use DatabaseTransactions, InteractsWithUsers;

    /**
     * @todo: Lapidar testes. Criar novos usuários, novas carteiras para não depender de dados do banco real
     *
     * @return void
     */
    public function test_payment_insuficiente_amount_wallet()
    {
        $this->setUpUser();

        $content = $this->json('post', 'api/pay', ['amount' => 200, 'payee' => '2bf51881-225a-4ff8-81c4-e08006cfad19'])->baseResponse->getOriginalContent();

        $this->assertEquals(['message' => 'Saldo insuficiente'], $content);
    }

    public function test_payment_nonexistent_wallet()
    {
        $this->setUpUser();

        $this->json('post', 'api/deposit', ['amount' => 200])->baseResponse->getOriginalContent();

        $content = $this->json('post', 'api/pay', ['amount' => 200, 'payee' => 'aaaaaaa'])->baseResponse->getOriginalContent();

        $this->assertEquals('{"message":"The given data was invalid.","errors":{"payee":["Carteira n\u00e3o encontrada em nossa base"]}}', json_encode($content));
    }
}
