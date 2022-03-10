<?php

namespace App\Services;

use App\Helpers\Format;
use App\Jobs\Notify;
use App\Repositories\Contracts\TransactionRepositoryInterface;
use App\Services\External\AuthorizationTransactionService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    protected $repository;
    protected $walletService;

    public function __construct(
        TransactionRepositoryInterface $repository,
        WalletService $walletService
    ) {
        $this->repository = $repository;
        $this->walletService = $walletService;
    }

    public function deposit($request)
    {
        $myUser = Auth()->user();
        $shopkeeper = $myUser->is_shopkeeper;

        if ($shopkeeper) {
            return response(['message' => "Conta não-configurável para pagamento. Lojistas podem apenas receber pagamentos"], 422);
        }

        DB::beginTransaction();

        try {
            $this->walletService->withdraw($request);
            $walletPayee = $this->walletService->deposit($request);

            $this->validTransaction();

            $user = $walletPayee->user;

            $this->repository->create([
                'payer' => $myUser->id,
                'payee' => $user->id,
                'amount' => $request->amount
            ]);

            DB::commit();

            Notify::dispatch($user, $request->amount, Carbon::now()->format('d/m/Y h:i:s'));

            return response([
                "payload" => [
                    "value" => Format::money($request->amount),
                    "payer" => Auth()->user()->wallet->uuid,
                    "payee" => $walletPayee->user->wallet->uuid

                ],
                'message' => "Valor pago com sucesso. Enviamos uma notificação para o(a) Sr(a). $user->name",
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Função para validar transação na API externa de Transações
     *
     * @return mixed
     */
    public function validTransaction()
    {
        $authorizationTransaction = new AuthorizationTransactionService();
        $response = $authorizationTransaction->consult();

        if ($response instanceof \Exception) {
            throw $response;
        }

        return $response;
    }
}
