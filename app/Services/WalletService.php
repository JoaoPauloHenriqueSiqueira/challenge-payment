<?php

namespace App\Services;

use App\Http\Resources\MyWalletResource;
use App\Repositories\Contracts\WalletRepositoryInterface;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class WalletService
{
    protected $repository;
    protected $transactionService;

    public function __construct(
        WalletRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Retorna dados de exibição da carteira do usuário logado
     *
     * @return JsonResource
     */
    public function showMyWallet(): JsonResource
    {
        $wallet = $this->repository->firstOrCreate(["user_id" => Auth()->user()->id]);
        return new MyWalletResource($this->repository->find($wallet->id));
    }

    /**
     * Retorna dados de banco da carteira do usuário logado
     *
     * @return mixed
     */
    public function getMyWallet()
    {
        $wallet = $this->showMyWallet();
        return $this->repository->find($wallet->id);
    }

    /**
     * Retorna dados de banco da carteira de usuário pelo id com o relacionamento de usuário
     *
     * @return mixed
     */
    public function find($walletId)
    {
        return $this->repository->find($walletId)->with('user');
    }

    /**
     * Retorna dados de banco da carteira de usuário pelo token
     *
     * @return mixed
     */
    public function getWallet($token)
    {
        return $this->repository->findByField('uuid', $token)->first();
    }

    /**
     * Função para depositar dinheiro na conta
     *
     * @todo Criar regra DEPÓSITO (banco, controller, service e repository) para histórico de transações
     * 
     * @param [type] $request
     * @return Response
     */
    public function depositMyAccount($request)
    {
        $database = app(DB::class);
        $database->beginTransaction();

        try {
            $amount = $request->amount;
            $walletDb = $this->getMyWallet();
            $walletDb->amount = $walletDb->amount + $amount;
            $walletDb->save();

            $database->commit();

            return response(['message' => "Valor depositado com sucesso"], 200);
        } catch (\Exception $e) {
            $database->rollback();
            return response(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Deposita valor na conta de um terceiro
     *
     * @param array request
     *
     * @return mixed
     */
    public function deposit($request)
    {
        $walletDb = $this->getWallet($request->payee);
        $myWallet = $this->getMyWallet();

        if (!$walletDb) {
            throw new Exception('Carteira não encontrada');
        }

        if ($walletDb->id == $myWallet->id) {
            throw new Exception('Não pode pagar para sua própria conta');
        }

        $amount = $request->amount;
        $walletDb->amount = $walletDb->amount + $amount;
        $walletDb->save();

        return $walletDb;
    }

    /**
     * Desconta valor da carteira do pagante
     *
     * @param [type] $request
     * @return Response
     */
    public function withdraw($request): Response
    {
        $walletDb = $this->getMyWallet();

        $amount = $request->amount;

        if ($walletDb->amount < $amount) {
            throw new Exception('Saldo insuficiente');
        }

        $walletDb->amount = $walletDb->amount - $amount;
        $walletDb->save();
        return response(['message' => "Valor sacado com sucesso"]);
    }
}
