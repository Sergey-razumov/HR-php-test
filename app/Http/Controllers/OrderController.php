<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\OrderComplete;
use App\Order;
use App\Partner;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function list(Order $order)
    {
        $orders = $order->getOrders();


        return view('order/list', compact('orders'));
    }

    public function edit(int $id)
    {
        $order = Order::findOrFail($id);
        $partners = Partner::get();
        $orderStatus = Order::ORDER_STATUS;

        return view('order/edit', compact('order', 'partners', 'orderStatus'));
    }

    public function save(OrderRequest $request)
    {

        $order = Order::findOrFail($request->id);
        $order->client_email = $request->client_email;
        $order->partner_id = $request->partner_id;
        $order->status = $request->status;
        $order->save();

        if ($order->status == Order::ORDER_STATUS_COMPLETED) {
            $emails = $order->getEmails();

            foreach ($emails as $email) {
                Mail::to($email)->send(new OrderComplete($order));
            }
        }

        return redirect(route('order.list'));
    }
}
