<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * @group User endpoints
 */
class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Paginate users according same parameters get
     *
     * @authenticated
     * 
     * @queryParam order Comma-separated fields to include in the response. Example: email,desc
     * @queryParam limit integer Quantity to show per page. Defaults to '20'.
     * 
     * @response 200 
     *{
     *   "data": [{
     *           "id": 5,
     *           "name": "Demo",
     *           "email": "demo@demo.com",
     *           "cpf": "***.392.260-**",
     *           "wallet": null
     *       },
     *       {
     *           "id": 6,
     *           "name": "Demo",
     *           "email": "demo@demo.com2",
     *           "cpf": "***.392.260-**",
     *           "wallet": null
     *       },
     *       {
     *           "id": 9,
     *           "name": "José Osvaldo s",
     *           "email": "joao@gmail.comasd",
     *           "cpf": "***.392.260-**",
     *           "wallet": null
     *       }
     *   ]
     *
     *}
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->service->list($request);
    }

    /**
     * GET user according $id
     *
     * @authenticated
     * 
     * @urlParam id integer required The ID of the user.
     * 
     * @response 200 
     *{
     *   "data": {
     *       "id": 5,
     *       "name": "Demo",
     *       "email": "demo@demo.com",
     *       "cpf": "***.392.260-**",
     *       "wallet": null
     *   }
     *}
     *
     * @response status=422 scenario="Validation error" {
     *    "message": "Usuário não encontrado em nossa base.",
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        return $this->service->get($userId);
    }

    /**
     * Handle a registration request for the application.
     * 
     *@authenticated
     *
     * @bodyParam name string required The name of the user. Example: Gabriel Mendes
     * @bodyParam email email required The email of the user. Example: gabriel@gmail.com.br
     * @bodyParam password password required The password of the user. Example: 123456
     * @bodyParam password_confirmation password required The password confirmation of the user. Example: 123456
     *
     * @response 200 scenario="success changing password"
     *{
     *  "message": "Dados alterados. Necessário fazer login novamente"
     *}
     * @response 200 scenario="success not changing password"
     *{
     *   "user": {
     *       "id": 4,
     *       "name": "José Osvaldo s",
     *       "email": "jose@gmail.com",
     *       "email_verified_at": null,
     *       "cpf": "412.260.118-28",
     *       "is_shopkeeper": 0,
     *       "created_at": "2022-03-11T13:31:19.000000Z",
     *       "updated_at": "2022-03-12T11:52:51.000000Z"
     *   }
     *}
     *
     *   
     * @response status=422 scenario="Validation error" {
     *    "message": "The given data was invalid.",
     *    "errors": {
     *        "email": [
     *            "Esse email já está registrado em nossa base"
     *        ]
     *    }
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        return $this->service->update($request);
    }

    /**
     * Delete the user logged.
     *
     * @authenticated
     * @response status=200 scenario="Success" 
     *{
     *  "message": "Conta removida. Até breve =)"
     *}
     * @response status=400 scenario="Unauthenticated" {
     *     "message": "Unauthenticated."
     *}
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        return $this->service->delete();
    }
}
