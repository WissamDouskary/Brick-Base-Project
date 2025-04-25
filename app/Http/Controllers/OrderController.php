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
            'quantity' => 'gt:0|required|numeric|max:20',
            'price' => 'required'
        ]);

        $existOrder = Order::where('client_id', Auth::id())->where('product_id', $request->product_id)->where('status', 'Pending')->first();

        if($existOrder){
            $existOrder->update([
                'quantity' => $existOrder->quantity + $request->quantity
            ]);
            return back()->with('success', 'Order Created, Go to Orders To Checkout!');
        }

        $this->orderservice->create([
            'quantity' => $request->quantity,
            'status' => 'Pending',
            'product_id' => $request->product_id,
            'price' => $request->price
        ]);

        return back()->with('success', 'Order Created, Go to Orders To Checkout!');
    }

    public function getClientOrders(Request $request){
        $status = $request->input('status');

        if($status && $status !== "All"){
            $orders = $this->orderservice->filterClientOrders($status);
        } else {
            $orders = $this->orderservice->getClientOrders();
        }
        
        return view('Pages.orders', compact('orders'));
    }

    public function cancelOrder($id){
        $this->orderservice->cancelOrder($id);

        return back()->with('success', 'Order Cancelled :(');
    }
}
