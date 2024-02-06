<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    use HasFactory;

    public static function getAllAdresses()
    {
        return DB::table('addresses')->get();
    }
    public static function showAdress($id)
    {
        return DB::table('addresses')->where('id',$id)->get();
    }
    public static function storeAddress($request)
    {
        return DB::table('addresses')->insertGetId([
            'region' => $request->region,
            'city' => $request->city,
            'street' => $request->street,
            'building' => $request->building,
            'mail_index' => $request->mail_index,
            'user_id' => $request->user_id,
        ]);
    }
    public static function updateAddress($request, $id): int
    {
        return DB::table('addresses')
            ->where('id', $id)
            ->update([
                'region' => $request->region,
                'city' => $request->city,
                'street' => $request->street,
                'building' => $request->building,
                'mail_index' => $request->mail_index,
                'user_id' => $request->user_id,
            ]);
    }
    public static function deleteAddress($id): int
    {
        return DB::table('addresses')
            ->where('id', $id)
            ->delete();
    }
}
