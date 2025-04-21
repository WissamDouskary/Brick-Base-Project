<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PayPalController extends Controller
{
    public function checkout()
    {
        return view('Pages.paypal.checkout');
    }

    public function createOrder($id)
    {
        $client = PayPalClient::client();
        $order = Order::find($id);

        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [[
                'amount' => [
                    'currency_code' => 'USD',
                    'value' => number_format($order->price * $order->quantity + 5.99, 2),
                ]
            ]],
            'application_context' => [
                'cancel_url' => route('checkout.cancel'),
                'return_url' => route('checkout.success'),
            ]
        ];

        $response = $client->execute($request);

        $order->paypal_order_id = $response->result->id;

        $order->save();

        foreach ($response->result->links as $link) {
            if ($link->rel === 'approve') {
                return redirect()->away($link->href);
            }
        }

        return redirect()->route('checkout')->with('error', 'Could not initiate PayPal payment.');
    }

    public function captureOrder($orderId)
    {
        $client = PayPalClient::client();
        $request = new OrdersCaptureRequest($orderId);
        $request->prefer('return=representation');

        $response = $client->execute($request);

        return response()->json([
            'status' => $response->result->status,
            'details' => $response->result
        ]);
    }

    public function handleSuccess(Request $request)
    {
        $orderId = $request->query('token');
        $client = PayPalClient::client();
    
        $captureRequest = new OrdersCaptureRequest($orderId);
        $captureRequest->prefer('return=representation');
    
        $response = $client->execute($captureRequest);
    
        if ($response->statusCode === 201) {
            $orders = Order::where('paypal_order_id', $orderId)->get();
    
            foreach ($orders as $order) {
                $order->status = 'Completed';
                $order->save();
            }
    
            return redirect()->route('orders.list')->with('success', 'Payment successful!');
        }
    
        return redirect()->route('checkout')->with('error', 'Payment failed.');
    }

    public function handleCancel()
    {
        return redirect()->route('checkout')->with('error', 'Payment canceled.');
    }

    public function createMultiOrder()
{
    $client = PayPalClient::client();
    $orders = Order::where('status', 'Pending')->get();

    if ($orders->isEmpty()) {
        return redirect()->route('checkout')->with('error', 'No pending orders found.');
    }

    $total = $orders->reduce(function ($carry, $order) {
        return $carry + ($order->price * $order->quantity);
    }, 0) + 5.99;

    $request = new OrdersCreateRequest();
    $request->prefer('return=representation');
    $request->body = [
        'intent' => 'CAPTURE',
        'purchase_units' => [[
            'amount' => [
                'currency_code' => 'USD',
                'value' => number_format($total, 2),
            ]
        ]],
        'application_context' => [
            'cancel_url' => route('checkout.cancel'),
            'return_url' => route('checkout.success'),
        ]
    ];

    $response = $client->execute($request);
    $paypalOrderId = $response->result->id;

    foreach ($orders as $order) {
        $order->paypal_order_id = $paypalOrderId;
        $order->save();
    }

    foreach ($response->result->links as $link) {
        if ($link->rel === 'approve') {
            return redirect()->away($link->href);
        }
    }

    return redirect()->route('checkout')->with('error', 'Could not initiate PayPal payment.');
}
}
