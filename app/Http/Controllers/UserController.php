<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'first_name' => 'required|min:3|max:10|string',
            'last_name' => 'required|min:3|max:10|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'profile_photo' => 'required|image|max:4096',
            'city' => 'required',
            'password' => 'required|min:8',
            'terms' => 'accepted'
        ]);

        $role = Role::where('id', $fields['role'])->first();

        $photo = $request->file('profile_photo')->store('profile_photos', 'public');

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id' => $request->role,
            'profile_photo' => $photo,
            'city' => $request->city,
            'password' => $request->password,
            'terms' => $request->terms,
            'is_active' => true,
        ]);

        auth()->login($user);

        if ($role->id == 1) {
            return redirect()->route('CompleteRegistration');
        }

        return redirect()->route('Home');
    }

    public function login(Request $request){

        $fields = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if(Auth::attempt($fields)){
            $request->session()->regenerate();

            return redirect()->route('Home');
        }

        return back()->with('error', 'email or password invalide!');
    }

    public function completeRegistration(Request $request)
    {
        $fields = $request->validate([
            'bio' => 'required',
            'job_title' => 'required',
        ]);

        $user = Auth::user();

        $user->update([
            'bio' => $request->bio,
            'job_title' => $request->job_title
        ]);

        $user->save();

        return redirect()->route('Home');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('SignUp');
    }
}
