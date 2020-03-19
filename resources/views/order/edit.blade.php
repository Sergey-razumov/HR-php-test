@extends('layouts.master')

@section('title', 'Edit order #' . $order->id)

@section('header')
    @parent
@stop

@section('content')
    <h3>Edit order # {{ $order->id }}</h3>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" action="{{ route('order.save') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputClientEmail" class="col-sm-2 control-label">Client Email:</label>
            <div class="col-sm-10">
                <input name="client_email" type="email" class="form-control" id="inputClientEmail" placeholder="Client Email" value="{{ $order->client_email }}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPartner" class="col-sm-2 control-label">Partner:</label>
            <div class="col-sm-10">
                <select name="partner_id" id="inputPartner" class="form-control">
                    @foreach($partners as $partner)
                        <option value="{{ $partner->id }}" @if($partner->id === $order->partner_id) selected @endif>{{ $partner->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Products:</label>
            <div class="col-sm-10">
                @foreach($order->orderProducts as $orderProduct)
                    <div class="form-control-static">
                        <p class="pull-left">{{ $orderProduct->product->name }}</p>
                        <p class="pull-right">{{ $orderProduct->quantity }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="inputOrderStatus" class="col-sm-2 control-label">Status:</label>
            <div class="col-sm-10">
                <select name="status" id="inputOrderStatus" class="form-control">
                    @foreach($orderStatus as $value => $description)
                        <option value="{{ $value }}" @if($value === $order->status) selected @endif>{{ $description }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Price:</label>
            <div class="col-sm-10">
                <p class="form-control-static pull-right">{{ $order->price() }}</p>
            </div>
        </div>
        <input class="hidden" name="id" value="{{ $order->id }}">
        <button type="submit" class="btn btn-primary pull-right">Save</button>
    </form>
@stop

@section('footer')
    @parent
@stop
