<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function store(array $data);
    public function getClientOrders();
    public function filterClientOrders($status);
    public function cancelOrder($id);
}