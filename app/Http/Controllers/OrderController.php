<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    protected $orderservice;

    public function __construct(OrderService $order_service)
    {
        $this->orderservice = $order_service;
    }

    public function store(Request $request){
        $request->validate([
            'quantity' => 'gt:0|required|numeric',
            'price' => 'required'
        ]);

        $total_price = $request->quantity * $request->price;

        $existOrder = Order::where('client_id', Auth::id())->where('product_id', $request->product_id)->where('status', 'Pending')->first();

        if($existOrder){
            $existOrder->update([
                'quantity' => $existOrder->quantity + $request->quantity,
                'price' => $existOrder->price + $total_price
            ]);
            return back()->with('success', 'Order Created, Go to Orders To Checkout!');
        }

        $this->orderservice->create([
            'quantity' => $request->quantity,
            'status' => 'Pending',
            'product_id' => $request->product_id,
            'price' => $total_price
        ]);

        return back()->with('success', 'Order Created, Go to Orders To Checkout!');
    }
}
