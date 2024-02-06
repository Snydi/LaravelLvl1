<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    public static function getAllUsers()
    {
        return DB::table('users')->get();
    }
    public static function showUser($id)
    {
        return DB::table('users')->where('id',$id)->get();
    }
    public static function storeUser($request)
    {
        return DB::table('users')->insertGetId([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'messages_accepted' => $request->messages_accepted,
        ]);
    }
    public static function updateUser($request, $id): int
    {
        return DB::table('users')
            ->where('id', $id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'messages_accepted' => $request->messages_accepted,
            ]);
    }
    public static function deleteUser($id): int
    {
        return DB::table('users')
            ->where('id', $id)
            ->delete();
    }
}

