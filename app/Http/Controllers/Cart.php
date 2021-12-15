<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use App\Models\Menu;
use App\Models\Order;
use App\Models\product_order;
use Mail;


class Cart extends Controller
{
    public function menu(){
        $list=Menu::all();
        return view('admin.pages.menu',compact('list'));
    }
    public function cart()
    {
        return view('admin.pages.cart');
    }
    public function checkout($val)
    {
        return view('admin.pages.checkout',['val'=>$val]);
    }
    public function order(){
        $user=session('user');
        $uid=$user->id;
        $order=Order::where('cid',$uid)->latest()->first();
        $orderid=$order->id;
        $orderproducts=product_order::where('oid',$orderid)->get();
        return view('admin.pages.order',['order'=>$order,'orderproducts'=>$orderproducts]);
        // return $orderproducts;
    }
        public function postOrder(Request $req){
            $validate = $req->validate([
                'creditCard' => "required|min:16"
            ]);
            if($validate){
                $customer=session('user');
                $cid=$customer->id;
                $mailId=$customer->email;
                $product=session()->get('cart', []);
                $order = new Order();
                $order->cid=$cid;
                $order->total=$req->total;
                $order->ccdetails=$req->creditCard;
                $order->save();
                $oid=Order::where('cid',$cid)->get('id');
                foreach($oid as $o){
                    $sid=$o["id"];
                }
                $req->session()->put('orderid',$sid);
                foreach($product as $key=>$k){
                    $id = $key;
                    $orderproduct = new product_order();
                    $orderproduct->oid = $o["id"];
                    $orderproduct->pname = $product[$id]["name"];
                    $orderproduct->price = $product[$id]["price"];
                    $orderproduct->quantity = $product[$id]["quantity"];
                    $orderproduct->image = $product[$id]["image"];
                    $orderproduct->save();
                }
                $req->session()->forget('cart');
                $order=Order::where('cid',$cid)->latest()->first();
                $orderid=$order->id;
                $product=product_order::where('oid',$orderid)->get();
                $data=['order'=>$order,'orderproducts'=>$product];
                $user['to']=$mailId;
                Mail::send('admin.Mail.mail',$data,function($message) use ($user){
                    $message->to($user['to']);
                    $message->subject('Order Confirmation mail');
                });
                return view('admin.pages.success'); 
            }
        }
        
    public function addToCart($id)
    {
        $product = Menu::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
   
}

