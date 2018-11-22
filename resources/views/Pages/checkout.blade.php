@extends('layouts.app')
@extends('layouts.navbar')
@section('content')
<div class="container">


      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill"></span>
          </h4>
          <ul class="list-group mb-3">
            @if(session('cart'))
              @foreach($products as $product)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$product->name}}</h6>
                <small class="text-muted">{{$product->description}}</small>
              </div>
              <span class="text-muted">{{$product->qty}}</span>
              <span class="text-muted">{{$product->price}}</span>
            </li>
              @endforeach
            @endif
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (Eur)</span>
              <strong>{{Cart::total()}}€</strong>
            </li>
          </ul>
        </div>
        </div>
        <script src='https://js.stripe.com/v3/' type='text/javascript'></script>
        <form accept-charset="UTF-8" action="{{action('ProductsController@charge')}}"
    data-cc-on-file="false"
    data-stripe-publishable-key="{{env('STRIPE_PUB_KEY')}}"
    id="payment-form" method="post">
    {{ csrf_field() }}
    <div id="card-element">

    </div>
    <button>Submit Payment</button>
    <script>
    var stripe = Stripe('pk_test_EOToCtJ1lbM6XfcgnsZrQ4Gy');
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event){
      event.preventDefault();

      stripe.createToken(card).then(function(result){
        stripeTokenHandler(result.token);
      });

      function stripeTokenHandler(token){
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
      }
    });
    </script>
    <script
      data-key="{{env('STRIPE_PUB_KEY')}}"
      data-amount="{{Cart::total() * 100}}"
      data-locale="auto"
      data-currency="eur"
      data-email="{{Auth::user()->email}}">
    </script>
</form>

        </div>
        </form>
      </div>

@endsection
