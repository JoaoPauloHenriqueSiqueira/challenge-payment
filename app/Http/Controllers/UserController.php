<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->service->list($request);
    }

    public function show(Request $request)
    {
       
    }

    public function update(UpdateUserRequest $request)
    {
        return $this->service->update($request);
    }

    public function destroy()
    {
        return $this->service->delete();

    }
}
