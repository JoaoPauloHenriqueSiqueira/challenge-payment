<?php

namespace App\Services;

use App\Helpers\Format;
use App\Jobs\Notify;
use App\Repositories\Contracts\TransactionRepositoryInterface;
use App\Services\External\AuthorizationTransactionService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    protected $repository;

    public function __construct(
        TransactionRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function create($payer, $payee, $amount)
    {
        return $this->repository->create([
            'payer' => $payer,
            'payee' => $payee,
            'amount' => $amount
        ]);
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
            $walletService = app(WalletService::class);

            $walletService->withdraw($request);
            $walletPayee = $walletService->deposit($request);

            $this->validTransaction();

            $user = $walletPayee->user;
            if (!$user) {
                throw new Exception('Usuário removeu a conta');
            }

            $this->create($myUser->id, $user->id, $request->amount);

            DB::commit();

            Notify::dispatch($user, $request->amount, Carbon::now()->format('d/m/Y h:i:s'))->onQueue('mail');;

            return response([
                "payload" => [
                    "value" => app(Format::class)->money($request->amount),
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
        $authorizationAPI = new AuthorizationTransactionService();
        $response = $authorizationAPI->consult();

        if ($response instanceof \Exception) {
            throw $response;
        }

        return $response;
    }
}
