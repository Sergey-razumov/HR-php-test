@extends('layouts.master')

@section('title', 'Products')

@section('header')
    @parent
@stop

@section('content')
    <h3>Products</h3>
    @if($products->count() > 0)
        <table class="table table-bordered">
            <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Vendor</td>
                <td>Price</td>
            </tr>
            </thead>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->vendor->name }}</td>
                    <td><input type="number" onchange="changePrice(this.value, {{ $product->id }})" value="{{ $product->price }}"></td>
                </tr>
            @endforeach
        </table>
        @include('pagination', ['items' => $products])
    @else
        <h4>Product not found</h4>
    @endif
@stop

@section('footer')
    @parent
@stop
