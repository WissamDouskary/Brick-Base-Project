<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data);
    public function findById($id);
    public function getWorkers();
    public function get3workers($id);
    public function filterByRoleAndStatus($role_id, $is_active);
    public function getAllUsers();
    public function filterByActive($is_active);
    public function filterByRole($role_id);
}