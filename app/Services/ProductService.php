<?php
namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;


Class ProductService {

    protected $productrepository;

    public function __construct(ProductRepositoryInterface $product_repository)
    {
        $this->productrepository = $product_repository;
    }

    public function create($data){
        return $this->productrepository->create($data);
    }

    public function update(array $data, int $id){
        return $this->productrepository->update($data, $id);
    }

    public function delete(int $id){
        return $this->productrepository->destroy($id);
    }

    public function getall(){
       return $this->productrepository->getall();
    }

    public function findById($id){
        return $this->productrepository->findById($id);
    }

    public function get3($id){
        return $this->productrepository->get3($id);
    }

    public function getWorkerProducts(){
        return $this->productrepository->getWorkerProducts();
    }
}