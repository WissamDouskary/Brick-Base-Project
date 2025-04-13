<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|min:3|max:10|string',
            'last_name' => 'required|min:3|max:10|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'profile_photo' => 'required|image|max:4096',
            'city' => 'required',
            'password' => 'required|min:8',
            'terms' => 'accepted'
        ]);
    
        $role = Role::where('id', $data['role'])->first();
    
        $user = $this->userService->registerUser($data);
    
        if ($role->id == 1) {
            return redirect()->route('CompleteRegistration');
        }
    
        return redirect()->route('Home');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if ($this->userService->loginUser($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('Home');
        }

        return back()->with('error', 'Email ou mot de passe invalide !');
    }

    public function logout()
    {
        $this->userService->logoutUser();
        return redirect()->route('SignUp');
    }

    public function getWorkers()
    {
        $workers = $this->userService->getWorkers();
        return view('Pages.Workers', compact('workers'));
    }

    public function find($id)
    {
        $worker = $this->userService->findWorker($id);
        $workers = $this->userService->get3workers($id);

        return view('Pages.Worker-preview', compact('worker', 'workers'));
    }

    public function completeRegistration(Request $request)
    {
        $user = Auth::user();
        $role = $user->role_id;

        if ($role == 2) {
            return redirect()->route('Home');
        }
    
        $request->validate([
            'bio' => 'required|min:40|max:255',
            'job_title' => 'required',
            'category' => 'required',
            'price' => 'required'
        ]);

        $user->update([
            'bio' => $request->bio,
            'job_title' => $request->job_title,
            'category' => $request->category,
            'is_active' => false,
            'price' => $request->price
        ]);
    
        return redirect()->route('Home');
    }
}
