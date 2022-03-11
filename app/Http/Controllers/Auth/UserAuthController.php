<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Response;

/**
 * @group Auth endpoints
 */
class UserAuthController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle a registration request for the application.
     *
     * @bodyParam name string required The name of the user. Example: Gabriel Mendes
     * @bodyParam email email required The email of the user. Example: gabriel@gmail.com.br
     * @bodyParam password password required The password of the user. Example: 123456
     * @bodyParam password_confirmation password required The password confirmation of the user. Example: 123456
     * @bodyParam cpf string required The cpf of the user. Example: 948.305.030-84
     *
     * @response 200 {
     *  "user": {
     *      "name": "José",
     *      "email": "jose@gmail.com",
     *      "cpf": "412.260.118-28",
     *      "is_shopkeeper": "1",
     *      "updated_at": "2022-03-11T13:31:19.000000Z",
     *      "created_at": "2022-03-11T13:31:19.000000Z",
     *      "id": 4
     * },
     *  "token": "4|mRXLMJGW4JX7ySXqEmiOO2C0kVQQQg7ba15CYKHi"
     *}
     *
     *   
     * @response status=422 scenario="Validation error" {
     *    "message": "The given data was invalid.",
     *    "errors": {
     *        "email": [
     *            "The email field is required."
     *        ]
     *    }
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request): Response
    {
        return $this->service->register($request);
    }

    /**
     * Handle a login request to the application.
     *
     * @bodyParam email email required The email of the user. Example: gabriel@gmail.com.br
     * @bodyParam password password required The password of the user. Example: 123456
     *
     * @response status=422 scenario="Validation error" {
     *    "message": "The given data was invalid.",
     *    "errors": {
     *        "email": [
     *            "The email field is required."
     *        ]
     *    }
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request): Response
    {
        return $this->service->login($request);
    }

    /**
     * Log the user out of the application.
     *
     * @authenticated
     * @response status=200 scenario="Success" {
     *     "message": "Deslogado com sucesso."
     * }
     * @response status=400 scenario="Unauthenticated" {
     *     "message": "Unauthenticated."
     * }
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(): Response
    {
        return $this->service->logout();
    }
}
