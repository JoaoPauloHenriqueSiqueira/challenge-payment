<?php

namespace App\Services;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Função que cria um usuário na base de dados, carteira e retorna um token
     *
     * @param RegisterRequest $request
     * @return Response
     */
    public function register(RegisterRequest $request): Response
    {
        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        $user = $this->repository->create($data);

        $token = $user->createToken('API Token')->plainTextToken;

        return response(['user' => $user, 'token' => $token]);
    }


    /**
     * Função para retornar login do usuário
     *
     * @param LoginRequest $request
     * @return Response
     */
    public function login(LoginRequest $request): Response
    {
        if (!auth()->attempt($request->all())) {
            return response([
                'errors' => 'Credenciais incorretas'
            ], 422);
        }

        $token = auth()->user()->createToken('API Token')->plainTextToken;

        return response(['user' => auth()->user(), 'token' => $token]);
    }

    /**
     * Destrói o token gerado para o usuário
     *
     * @param string $msg
     * @return Response
     */
    public function logout(String $msg = "Deslogado com sucesso"): Response
    {
        auth()->user()->tokens()->delete();
        return response(['message' => $msg]);
    }

    /**
     * Retorna lista de usuários paginada e formatada
     *
     * @param [type] $request
     * @return JsonResource
     */
    public function list($request): JsonResource
    {
        $limit = $request->all()['limit'] ?? 20;
        $order = $request->all()['order'] ?? null;

        if ($order !== null) {
            $order = explode(',', $order);
        }

        $order[0] = $order[0] ?? 'id';
        $order[1] = $order[1] ?? 'asc';

        $where = $request->all()['where'] ?? [];
        $like = $request->all()['like'] ?? null;

        if ($like) {
            $like =  explode(',', $like);
            $like[1] = "%$like[1]%";
        }

        $result = $this->repository->orderBy($order[0], $order[1])
            ->where($where)
            ->with('wallet')
            ->where(function ($query) use ($like) {
                if ($like) {
                    return $query->where($like[0], 'like', $like[1]);
                }
                return $query;
            })
            ->paginate($limit);

        return UserResource::collection($result);
    }

    /**
     * Retorna dados de usuário
     *
     * @param [type] $id
     * @return mixed
     */
    public function get($userId)
    {
        try {
            return new UserResource($this->repository->find($userId));
        } catch (ModelNotFoundException $e) {
            return response([
                'message' => 'Usuário não encontrado em nossa base'
            ], 422);
        }
    }

    /**
     * Atualiza dados do usuário e desloga caso password seja alterado
     *
     * @param UpdateUserRequest $request
     * @return Response
     */
    public function update(UpdateUserRequest $request): Response
    {
        $password = $request->password ? bcrypt($request->password) : false;
        $data = $request->except(['cpf']);

        if ($password) {
            $data['password'] = $password;
        }

        $result = $this->repository->findOrFail(Auth::user()->id);
        $result->update($data);

        if ($password) {
            return $this->logout("Dados alterados. Necessário fazer login novamente");
        }

        return response(['user' => $result]);
    }

    /**
     * Exclui a conta
     *
     * @return Response
     */
    public function delete(): Response
    {
        $result = $this->repository->findOrFail(Auth::user()->id);
        $result->delete();
        return $this->logout("Conta removida. Até breve =)");
    }
}
