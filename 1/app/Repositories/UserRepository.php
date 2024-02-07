<?php


namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public static function index()
    {
        return User::all();
    }
    public static function showUser($id)
    {
        return User::where('id',$id)->get();
    }
    public static function store($request)
    {
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'messages_accepted' => $request->messages_accepted,
        ]);
    }
    public static function update($request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->messages_accepted = $request->messages_accepted;
        $user->save();
    }
    public static function destroy($id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->delete();
    }
}
