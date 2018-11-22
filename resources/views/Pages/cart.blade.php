<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cart page">
    <meta name="author" content="">

    <title>Cart page - www.website.com</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Cloudflare stuff -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/shop-homepage.css')}}" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}" >
  </head>

  <body>
    <!-- Navigation -->
    @extends('layouts.navbar')
    <!-- End of navigation -->

    <!-- Page Content -->
    <div class="container mb-4" id="cart">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col">Product</th>
                                <th scope="col">Available</th>
                                <th scope="col" class="text-center">Quantity</th>
                                <th scope="col" class="text-right">Price</th>
                                <th> </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(session('cart'))
                                @foreach($products as $product)
                            <tr class="hover">
                            <td><img src="{{$product->image}}" width="50" height="50" /></td>
                            <td>{{$product->name}}</td>
                                <td>Not available</td>
                                <td><input class="form-control text-center quantity" type="number" value="{{$product->qty}}" min="0" max="100" /></td>
                                <td class="text-right">{{$product->total}} €</td>
                                <td class="text-right">
                                <button class="btn btn-sm btn-primary update-cart" data-id="{{$product->rowId}}"><i class="fas fa-sync-alt"></i> </button>
                                    <button class="btn btn-sm btn-danger remove-from-cart" data-id="{{$product->rowId}}"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                                @endforeach
                            @endif
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Sub-Total</td>
                                <td class="text-right">{{Cart::total()}} €</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Shipping</td>
                                <td class="text-right">6,90 €</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td class="text-right"><strong>{{Cart::total()}} €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="index.html"><button class="btn btn-block btn-dark" id="contsh">Continue shopping</button></a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="#"><button class="btn btn-lg btn-block btn-success">Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Footer -->
    <footer id="footer" class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>
  </body>



</html>
