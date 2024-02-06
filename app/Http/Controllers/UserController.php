<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::getAllUsers();
    }
    public function show($id)
    {
        return User::showUser($id);
    }
    public function store(UserStoreRequest $request)
    {
        return User::storeUser($request);
    }
    public function update(UserUpdateRequest $request, $id)
    {
        return User::updateUser($request,$id);
    }
    public function destroy($id)
    {
        return User::deleteUser($id);
    }

}
