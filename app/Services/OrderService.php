<?php
namespace App\Services;

use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;


Class OrderService {

    protected $orderrepository;

    public function __construct(OrderRepositoryInterface $order_repository)
    {
        $this->orderrepository = $order_repository;
    }

    public function create($data){
        return $this->orderrepository->store($data);
    }

    public function getClientOrders()
    {
        return $this->orderrepository->getClientOrders();
    }

    public function filterClientOrders($status)
    {
        return $this->orderrepository->filterClientOrders($status);
    }
}