<?php
namespace App\Services;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUser($data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['profile_photo'] = $data['profile_photo']->store('profile_photos', 'public');
        $role = Role::find($data['role']);
    
        $data['role_id'] = $role->id;
    
        $data['is_active'] = ($role->id == 2);
    
        $user = $this->userRepository->create($data);
    
        Auth::login($user);
    
        return $user;
    }

    public function loginUser($credentials)
    {
        return Auth::attempt($credentials);
    }

    public function logoutUser()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }

    public function getWorkers()
    {
        return $this->userRepository->getWorkers();
    }

    public function findWorker($id)
    {
        return $this->userRepository->findById($id);
    }

    public function get3workers($id){
        return $this->userRepository->get3workers($id);
    }

    public function filterByActive($is_active)
    {
        return $this->userRepository->filterByActive($is_active);
    }

    public function filterByRole($role_id)
    {
        return $this->userRepository->filterByRole($role_id);
    }

    public function filterByRoleAndStatus($role_id, $is_active)
    {
        return $this->userRepository->filterByRoleAndStatus($role_id, $is_active);
    }

    public function getAllUsers(){
        return $this->userRepository->getAllUsers();
    }

    public function manageStatus($id, $status){
        return $this->userRepository->manageStatus($id, $status);
    }

    public function filterWorkers($data){
        return $this->userRepository->filterWorkers($data);
    }
}
