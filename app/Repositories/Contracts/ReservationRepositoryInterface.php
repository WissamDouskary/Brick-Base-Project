<?php 

namespace App\Repositories\Contracts;

interface ReservationRepositoryInterface {
    public function create(array $data);
    public function modify(int $id, array $data);
    public function cancel(int $id);
}