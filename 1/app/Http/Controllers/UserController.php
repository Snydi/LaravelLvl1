<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    public function index()
    {
        return UserRepository::index();
    }
    public function show($id)
    {
        return UserRepository::showUser($id);
    }
    public function store(UserStoreRequest $request)
    {
        UserRepository::store($request);
        return response()->json(['message' => 'Пользователь успешно добавлен']);
    }
    public function update(UserUpdateRequest $request, $id)
    {
        UserRepository::update($request,$id);
        return response()->json(['message' => 'Пользователь успешно обновлен']);
    }
    public function destroy($id)
    {
        return UserRepository::destroy($id);
    }

}
