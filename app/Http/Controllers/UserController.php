<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
use Cart;

class UserController extends Controller
{
    public function getSignup(){
      return view('user.signup');
    }

    public function postSignup(Request $request){
      $this->validate($request, [
        'email' => 'email|required|unique:users',
        'password' => 'required|min:4'
      ]);

      $user = new User([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('key'))
      ]);
      $user->save();

      Auth::login($user);

      return redirect()->action('ProductsController@index');

    }

    public function getSignIn(){
      return view('user.signin');
    }

    public function postSignIn(Request $request){
      $this->validate($request, [
        'email' => 'email|required',
        'password' => 'required'
      ]);

      if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
          return redirect()->action('UserController@getProfile');
      }
      return redirect()->back();

    }

    public function getProfile(){
      $orders = Auth::user()->orders;
      $orders->transform(function($order, $key){
        $order->cart = unserialize($order->cart);
        return $order;
      });
      return view('user.profile', ['orders' => $orders]);
    }


    public function getLogout(){
      Auth::logout();
      return redirect()->back();
    }
}
