<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Cart;
use Session;
use Auth;
use App\Order;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.index')->with('products', $products);
    }

    public function cart()
    {
        if(!Session::has('cart')){
          return view('pages.cart');
        }
        $cart = Cart::content();
        return view('pages.cart', ['products' => $cart]);
    }

    public function checkout(){
      if(Auth::check()){
        if(!Session::has('cart')){
          return view('pages.checkout');
        }
        $cart = Cart::content();
        return view('pages.checkout', ['products' => $cart]);
      }else{
        return redirect()->action('UserController@getSignup');
      }
    }

    public function addToCart(Request $request,$id){
        $product = Product::find($id);

        Cart::add(array(
          'id' => $id,
          'name' => $product->name,
          'price' => $product->price,
          'qty' => 1,
          'image' => $product->image,
        ));
        $cart = Cart::content();
        return redirect()->back()->with('success', 'Item added to cart!');

    }

    public function charge(Request $request)
    {

      if(!Session::has('cart')){
        return view('pages.cart');
      }
      $cart = Cart::content();
      $token = $_POST['stripeToken'];
      Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

      $customer = Customer::create(array(
        'source' => $token,
        'description' => 'Payment for goods',
        'email' => Auth::user()->email
      ));

      $charge = Charge::create(array(
        'customer' => $customer->id,
        'amount' => Cart::total() * 100,
        'currency' => 'eur'
      ));
      $order = new Order();
      $order->cart = serialize($cart);
      $order->email = Auth::user()->email;
      $order->payment_id = $charge->id;
      $order->total = Cart::total();
      Auth::user()->orders()->save($order);
      Cart::destroy();
      return redirect()->action('ProductsController@index')->with('success','Products purchased!!!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$request->validate([
        //'product_name'=>'required',
        //'product_description'=> 'required',
        //'product_price' => 'required|integer'
      //]);

      $product = new Product([
        'name' => $request->get('product_name'),
        'description' => $request->get('product_desc'),
        'price' => $request->get('product_price'),
        'image' => $request->get('product_img')
      ]);
      $product->save();
      return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      if($request->rowId and $request->quantity){
        Cart::update($request->rowId, $request->quantity);
      }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      
      if($request->rowId){
        Cart::remove($request->rowId);
      }
    }
}
