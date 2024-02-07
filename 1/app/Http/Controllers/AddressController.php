<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressStoreRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Repositories\AddressRepository;

class AddressController extends Controller
{
    public function index()
    {
        return AddressRepository::index();
    }
    public function show($id)
    {
        return AddressRepository::show($id);
    }
    public function store(AddressStoreRequest $request)
    {
        AddressRepository::store($request);
        return response()->json(['message' => 'Адрес успешно добавлен']);
    }
    public function update(AddressUpdateRequest $request, $id)
    {
        AddressRepository::update($request,$id);
        return response()->json(['message' => 'Адрес успешно обновлен']);
    }
    public function destroy($id)
    {
        AddressRepository::destroy($id);
        return response()->json(['message' => 'Адрес успешно удален']);
    }
}
