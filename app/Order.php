<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const ORDER_STATUS_NEW         = 0;
    const ORDER_STATUS_CONFIRMED   = 10;
    const ORDER_STATUS_COMPLETED   = 20;

    const ORDER_STATUS = [
        Order::ORDER_STATUS_NEW         => 'New',
        Order::ORDER_STATUS_CONFIRMED   => 'Confirmed',
        Order::ORDER_STATUS_COMPLETED   => 'Completed'
    ];

    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }

    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function getOrders()
    {
        $overdueOrders      = Order::where('delivery_dt', '<', Carbon::now())
            ->where('status', Order::ORDER_STATUS_CONFIRMED)
            ->orderBy('delivery_dt', 'DESC')->limit(50)->get();

        $currentOrders      = Order::where('delivery_dt', '>', Carbon::now())
            ->where('delivery_dt', '<', Carbon::now()->addHour(24))
            ->where('status', Order::ORDER_STATUS_CONFIRMED)
            ->orderBy('delivery_dt', 'ASC')->limit(50)->get();

        $newOrders       = Order::where('delivery_dt', '>', Carbon::now())
            ->where('status', Order::ORDER_STATUS_NEW)
            ->orderBy('delivery_dt', 'ASC')->limit(50)->get();

        $completedOrders    = Order::whereDate('delivery_dt', Carbon::today())
            ->where('status', Order::ORDER_STATUS_COMPLETED)
            ->orderBy('delivery_dt', 'DESC')->limit(50)->get();

        return [
            'overdue' => $overdueOrders,
            'current' => $currentOrders,
            'new' => $newOrders,
            'completed' => $completedOrders,
        ];
    }

    public function getEmails()
    {
        $emails = [];

        $query = Order::join('partners', 'orders.partner_id', '=', 'partners.id')
            ->join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->join('vendors', 'products.vendor_id', '=', 'vendors.id')
            ->select('partners.email as partner_email', 'vendors.email as vendor_email')
            ->where('orders.id', 430)
            ->groupBy('partner_email', 'vendor_email')
            ->get();

        $emails[] = $query[0]->partner_email;
        foreach ($query as $email) {
            $emails[] = $email->vendor_email;
        }

        return $emails;
    }

    public function price()
    {
        $price = 0;
        $orderProducts = $this->orderProducts()->get();

        foreach ($orderProducts as $orderProduct){
            $price += $orderProduct->quantity * $orderProduct->price;
        }

        return $price;
    }
}
