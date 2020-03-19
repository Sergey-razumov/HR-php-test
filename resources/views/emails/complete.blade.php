<html lang="{{ app()->getLocale() }}">
    <head>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h3>Order #{{ $order->id }} is completed</h3>
            <table class="table">
                <thead>
                    <tr>
                        <td class="col-sm-10">Product</td>
                        <td class="col-sm-2">Quantity</td>
                    </tr>
                </thead>
                @foreach($order->orderProducts as $orderProduct)
                    <tr>
                        <td>{{ $orderProduct->product->name }}</td>
                        <td>{{ $orderProduct->quantity }}</td>
                    </tr>
                @endforeach
            </table>
            <ul>

            </ul>
            <h4 class="pull-right">Price: {{ $order->price() }}</h4>
        </div>
    </body>
</html>
