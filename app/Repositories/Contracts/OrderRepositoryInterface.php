<?php

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
    public function store(array $data);
}