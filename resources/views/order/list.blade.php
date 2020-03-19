@extends('layouts.master')

@section('title', 'Orders')

@section('header')
    @parent
@stop

@section('content')
    <h3>Orders</h3>
    <div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#overdue" aria-controls="overdue" role="tab" data-toggle="tab">Overdue</a></li>
            <li role="presentation"><a href="#current" aria-controls="current" role="tab" data-toggle="tab">Current</a></li>
            <li role="presentation" class="active"><a href="#new" aria-controls="new" role="tab" data-toggle="tab">New</a></li>
            <li role="presentation"><a href="#completed" aria-controls="completed" role="tab" data-toggle="tab">Completed</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="overdue">
                @include('order.table', ['orders' => $orders['overdue']])
            </div>
            <div role="tabpanel" class="tab-pane" id="current">
                @include('order.table', ['orders' => $orders['current']])
            </div>
            <div role="tabpanel" class="tab-pane active" id="new">
                @include('order.table', ['orders' => $orders['new']])
            </div>
            <div role="tabpanel" class="tab-pane" id="completed">
                @include('order.table', ['orders' => $orders['completed']])
            </div>
        </div>
    </div>
@stop

@section('footer')
    @parent
@stop
