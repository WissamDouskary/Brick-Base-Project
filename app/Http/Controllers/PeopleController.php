<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    protected $userservice;

    public function __construct(UserService $user_service)
    {
        $this->userservice = $user_service;
    }

    public function index(Request $request)
    {
        $role_id = $request->input('role', 'All');
        $status = $request->input('status', 'All');

        $users = null;

        if ($role_id !== 'All' && $status !== 'All') {
            $users = $this->userservice->filterByRoleAndStatus($role_id, $status);
        } elseif ($role_id !== 'All') {
            $users = $this->userservice->filterByRole($role_id);
        } elseif ($status !== 'All') {
            $users = $this->userservice->filterByActive($status);
        } else {
            $users = $this->userservice->getAllUsers();
        }

        return view('Pages.dashboard.people', compact('users'));
    }
}
