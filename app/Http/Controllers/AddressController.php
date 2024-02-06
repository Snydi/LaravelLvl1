<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressStoreRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return Address::getAllAdresses();
    }
    public function show($id)
    {
        return Address::showAdress($id);
    }
    public function store(AddressStoreRequest $request)
    {
        Address::storeAddress($request);
        return response()->json(['message' => 'Адрес успешно добавлен']);
    }
    public function update(AddressUpdateRequest $request, $id)
    {
        Address::updateAddress($request,$id);
        return response()->json(['message' => 'Адрес успешно обновлен']);
    }
    public function destroy($id): int
    {
        return Address::deleteAddress($id);
    }
}
