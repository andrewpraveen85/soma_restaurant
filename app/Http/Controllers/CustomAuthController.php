<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    } 
    
    public function dashboard()
    {
        if(Auth::check()){
            $orders = Order::orderBy('id', 'DESC')->get()->toArray();
            return view('dashboard',['orders'=>$orders,]);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function orderview($id)
    {
        if(Auth::check()){
            $main = Menu::select('menu_name', 'id')->where('menu_type', 'main')->get();
            $side = Menu::select('menu_name', 'id')->where('menu_type', 'side')->get();
            $dessert = Menu::select('menu_name', 'id')->where('menu_type', 'dessert')->get();
            $orderItems = OrderItems::where('order_id', $id)->get()->toArray();
            $order = Order::where('id', $id)->first();
            return view('orderview',['order'=>$order,'orderid'=>$id,'main'=>$main, 'side'=>$side, 'dessert'=>$dessert, 'orderItems'=>$orderItems]);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function orderItemscreate(Request $request)
    {
        if(Auth::check()){
            $request->validate([
                'order-item' => 'required',
            ]);
            $menu = Menu::where('id', $request->input('order-item'))->first();
            $order = Order::create(['order_total'=>$menu->menu_price]);
            OrderItems::create(['order_id'=> $order->id, 'menu_id'=>  $request->input('order-item'), 'order_price'=>$menu->menu_price]);
            return redirect()->intended('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function orderedit(Request $request)
    {
        if(Auth::check()){
            $request->validate([
                'order-item' => 'required',
            ]);
            $menu = Menu::where('id', $request->input('order-item'))->first();
            OrderItems::create(['order_id'=> $request->input('orderid'), 'menu_id'=>  $request->input('order-item'), 'order_price'=>$menu->menu_price]);
            $orderItems = OrderItems::where('order_id', $request->input('orderid'))->get();
            $total = 0;
            foreach($orderItems as $item){
                $total = $total + $item->order_price;
            }
            Order::where('id', $request->input('orderid'))->update([
                'order_total' => $total
            ]);
            return redirect()->route('order.view', ['id'=>$request->input('orderid')]);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function orderItemsremove(Request $request)
    {
        if(Auth::check()){
            $request->validate([
                'order-item-id' => 'required',
            ]);
            
            OrderItems::where('id', $request->input('order-item-id'))->delete();
            $orderItems = OrderItems::where('order_id', $request->input('orderid'))->get();
            $total = 0;
            foreach($orderItems as $item){
                $total = $total + $item->order_price;
            }
            Order::where('id', $request->input('orderid'))->update([
                'order_total' => $total
            ]);
            return redirect()->route('order.view', ['id'=>$request->input('orderid')]);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function ordercreate()
    {
        if(Auth::check()){
            $main = Menu::select('menu_name', 'id')->where('menu_type', 'main')->get();
            $side = Menu::select('menu_name', 'id')->where('menu_type', 'side')->get();
            $dessert = Menu::select('menu_name', 'id')->where('menu_type', 'dessert')->get();
            return view('ordercreate',['main'=>$main, 'side'=>$side, 'dessert'=>$dessert]);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function reports()
    {
        return view('reports');
    }  
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
