@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="row">
    <div class="col-md-6 img">
      <img src=""  alt="" class="img-rounded">
    </div>
    <div class="col-md-6 details">
      <blockquote>
        <h5>{{Auth::user()->name}}</h5>
        <h4>{{Auth::user()->email}}</h4>
      </blockquote>
      @foreach($orders as $order)
      <div class="card">
          <h5>Order Id:{{$order->id}}</h5>
          <h4>Total price:{{$order->total}}</h4>
          <div class="card-body">
            @foreach($order->cart as $item) 
            <ul class="list group">
            <li class="list-group-item">{{$item->name}} | QTY: {{$item->qty}} | Price: {{$item->total}}| Tax: {{$item->taxRate}}%</li>
            </ul>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </div>
  
@endsection
