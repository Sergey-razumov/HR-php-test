@extends('layouts.master')

@section('title', 'Products')

@section('header')
    @parent
@stop

@section('content')
    <h3>Temperature in Bryansk: {{ $weather->fact->temp }}°C</h3>
@stop

@section('footer')
    @parent
@stop
