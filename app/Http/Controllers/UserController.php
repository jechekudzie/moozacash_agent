<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $nationalId = $request->input('national_id');

        $users = User::where(function ($query) use ($name, $phone, $nationalId) {
            if ($name) {
                $query->orWhere('name', 'LIKE', "%$name%");
            }

            if ($phone) {
                $query->orWhere('phone', 'LIKE', "%$phone%");
            }

            if ($nationalId) {
                $query->orWhere('national_id', 'LIKE', "%$nationalId%");
            }
        })->get();

        //remove from collection if the user is already my beneficiary
        $users = $users->reject(function ($user) {
            return $user->beneficiaries->contains(auth()->user());
        });


        return response()->json($users);
    }

}
