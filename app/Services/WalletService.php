<?php

namespace App\Services;

use App\Http\Resources\WalletResource;
use App\Repositories\Contracts\WalletRepositoryInterface;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class WalletService
{
    protected $repository;

    public function __construct(WalletRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Retorna dados de exibição da carteira do usuário logado
     *
     * @return JsonResource
     */
    public function showMyWallet(): JsonResource
    {
        return new WalletResource($this->repository->firstOrCreate(["user_id" => Auth()->user()->id]));
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
    public function find($id)
    {
        return $this->repository->find($id)->with('user');
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
     * @param [type] $request
     * @return Response
     */
    public function depositMyAccount($request): Response
    {
        $amount = $request->amount;
        $walletDb = $this->getMyWallet();

        $walletDb->amount = $walletDb->amount + $amount;
        $walletDb->save();

        return response(['message' => "Valor adicionado com sucesso"]);
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
