<?php


namespace App\Repositories;


use App\Models\Address;

class AddressRepository
{
    public static function index()
    {
        return Address::all();
    }
    public static function show($id)
    {
        return Address::where('id',$id)->get();
    }
    public static function store($request)
    {
        Address::create([
            'region' => $request->region,
            'city' => $request->city,
            'street' => $request->street,
            'building' => $request->building,
            'mail_index' => $request->mail_index,
            'user_id' => $request->user_id,
        ]);
    }
    public static function update($request, $id)
    {
        $address = Address::find($id);
        $address->region = $request->region;
        $address->city = $request->city;
        $address->street = $request->street;
        $address->building = $request->building;
        $address->mail_index = $request->mail_index;
        $address->user_id = $request->user_id;
        $address->save();
    }
    public static function destroy($id)
    {
        $address = Address::find($id);
        $address->delete($id);
    }

}
