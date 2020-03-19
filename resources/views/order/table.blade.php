@if($orders->count() > 0)
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Id</td>
            <td>Partner</td>
            <td>Price</td>
            <td>Products</td>
            <td>Status</td>
        </tr>
        </thead>
        @foreach($orders as $order)
            <tr>
                <td><a href="{{ route('order.edit', ['id' => $order->id]) }}">{{ $order->id }}</a></td>
                <td>{{ $order->partner->name }}</td>
                <td>{{ $order->price() }}</td>
                <td>
                    @foreach($order->orderProducts as $orderProducts)
                        <p>{{ $orderProducts->product->name }} x {{ $orderProducts->quantity }}</p>
                    @endforeach
                </td>
                <td>{{ \App\Order::ORDER_STATUS[$order->status] }}</td>
            </tr>
        @endforeach
    </table>
@else
    <h4>Order not found</h4>
@endif
