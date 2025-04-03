<?php

namespace App\Repositories\Contracts;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function create(array $data);
    public function update(array $data, $id);
    public function destroy($id);
    public function findById($id);
    public function getall();
    public function get3($id);
}