<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientProfileController extends Controller
{
    public function update(Request $request){
        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'city' => 'required',
        ]);

        $user = Auth::user();

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'city' => $request->city,
        ]);

        return back()->with('success', 'Profile updated successfuly');
    }
}
