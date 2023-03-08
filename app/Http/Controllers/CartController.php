<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\CartItems;
use App\Products;
use App\Category;
use App\Orders;
use App\OrderDetails;
use App\SubCategory;
use App\User;
use App\Wishlist;


class CartController extends Controller

{

    public function userid(){
        $user = Auth::user();
        if($user){
            
        return $user->id;


        }
        else{
            return 0;
        }
    }

    public function wish(){
 
        $count = 0;
        if(!empty($this->userid()))

        {
        $cart_controller = new CartController;
        $d= Wishlist::where('user_id',$cart_controller->userid())
        ->get();
         
        foreach($d as $items)
       {
          $count +=$items->counter;
        }     
  
    }
    return $count;
     }
    public function carticon(){

        $count2 = 0;
        if(!empty($this->userid()))
{        $cart_controller = new CartController;
        $d= CartItems::where('user_id',$cart_controller->userid())
        ->get();
         
        foreach($d as $items)
       {
          $count2 +=$items->counter;
        }     
           }       return $count2;  
  
     }





    public function cart(CartItems $cart_items, Products $products){

$record = Products::join('cart_items', 'cart_items.product_id','=','products.id')
->select('products.product_name','products.product_image','cart_items.*')
->where('cart_items.user_id', $this->userid())->get();
$count = $this->wish();
$count2 = $this->carticon();
return view('cart', compact(['record','count','count2']));

    }

    public function addtocart(Products $products, CartItems $cartitems, $id){
        

        if(Auth::check())
        {
          $res = Products::find($id);
        $user = Auth::user();
          if(!empty(CartItems::where('product_id', $id )->where('user_id',$this->userid())->first()))
          {
              $res = CartItems::where('product_id', $id)->where('user_id',$this->userid())->first();
              $res->quantity = $res->quantity + 1;
              $res->total = $res->price * $res->quantity;
              $res->save();
  
          }else{

                  $data= new CartItems;
                  $data->product_id = $res->id;
                  $data->user_id = $this->userid();
                  $data->quantity = 1;
                  if($res->discount > 0){
                      $data->price = $res->discounted_price;  
                      $data->total = $res->discounted_price * $data->quantity;
                      $data->discount = $res->discount;

                  }
                  else{
                      $data->price = $res->product_price;
                      $data->total = $res->product_price * $data->quantity;
                      $data->discount = $res->discount;
                  }
                  $data->counter = 1;
                  

                  $data->save();
                  

          }
  
return "yes";
      }
else{
  return "Please Login!";
}
        
      


    }
    public function adddtocart(Products $products, CartItems $cartitems, $id){
        


          if(Auth::check())
          {
            $res = Products::find($id);
          $user = Auth::user();
            if(!empty(CartItems::where('product_id', $id )->where('user_id',$this->userid())->first()))
            {
                $res = CartItems::where('product_id', $id)->where('user_id',$this->userid())->first();
                $res->quantity = $res->quantity + 1;
                $res->total = $res->price * $res->quantity;
                $res->save();
    
            }else{

                    $data= new CartItems;
                    $data->product_id = $res->id;
                    $data->user_id = $this->userid();
                    $data->quantity = 1;
                    if($res->discount > 0){
                        $data->price = $res->discounted_price;  
                        $data->total = $res->discounted_price * $data->quantity;
                        $data->discount = $res->discount;

                    }
                    else{
                        $data->price = $res->product_price;
                        $data->total = $res->product_price * $data->quantity;
                        $data->discount = $res->discount;
                    }
                    $data->counter = 1;
                    

                    $data->save();
                    

            }
    
return "yes";
        }
else{
    return "Please Login!";
}
          

    }
    public function increase(CartItems $cartitems, $id){
                     
        $res = CartItems::where('product_id', $id)->where('user_id',$this->userid())->first();
        $res->quantity = $res->quantity + 1;
        $res->total = $res->price * $res->quantity;
        $res->save();
        return redirect('cart');
        
    }
    public function decrease(CartItems $cartitems, $id){
                     
        $res = CartItems::where('product_id', $id)->where('user_id',$this->userid())->first();
        
        $res->quantity = $res->quantity - 1;
        $res->total = $res->price * $res->quantity;
        $res->save();
        return redirect('cart');
        
    }
    public function delcart(CartItems $cartitems, $id){
        
        $d= CartItems::where('product_id',$id)
      ->where('user_id',$this->userid())
      ->first();
      $d->counter = 0;
      $d->save();             

        CartItems::where('product_id', $id)->where('user_id',$this->userid())->delete();
        return 'Product is removed from cart';
    
    }
    public function checkout(CartItems $cartitems, Products $products){

        $record = Products::join('cart_items', 'cart_items.product_id','=','products.id')
        ->select('products.product_name','cart_items.*')
        ->where('cart_items.user_id', $this->userid())->get();
        $data = CartItems::where('user_id',$this->userid())->get();
        $sum = 0;
        $item=0;
        foreach($data as $items)
        {
           $sum += $items->total;
        }
        $sale =  $sum + 10;


        $count = $this->wish();
        $count2 = $this->carticon();

    /////////////

   // Enter Your Stripe Secret
   \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        		
   $amount = $sale;
   $amount *= 100;
   $amount = (int) $amount;

   
   
   $payment_intent = \Stripe\PaymentIntent::create([
       'description' => 'Stripe Test Payment',
       'amount' => $amount,
       'currency' => 'usd',
       'description' => 'Payment From OnlineDukan',
       'payment_method_types' => ['card'],
   ]);
   $intent = $payment_intent->client_secret;

   return view('checkout', compact(['record','count','count2','intent', 'sale']));

    }


    public function added(Request $request, CartItems $cartitems){

        $res = new Orders;
        $res->user_id = $this->userid();
        $res->first_name = $request->input('fname');
        $res->last_name = $request->input('lname');
        $res->email = $request->input('email');
        $res->mobile_no = $request->input('cell');
        $res->address_1 = $request->input('address1');
        $res->addres_2 = $request->input('address2');
        $res->country = $request->input('country');
        $res->city = $request->input('city');
        $res->state = $request->input('state');
        $res->zipcode = $request->input('zcode');
        $pm = $request->input('payment');

        if($pm == 'olp')
        {
            $res->payment = 'Paid';
        }
        $data = CartItems::where('user_id',$this->userid())->get();
        $sum = 0;
        $item=0;
        foreach($data as $items)
        {
           $sum += $items->total;
           $item +=$items->quantity;
        }
        $res->total_amount =  $sum + 10;
        $res->items= $item;
                
        $res->save();

       
   
       foreach($data as $items)
        {
            $add = new OrderDetails;
       $add->order_id = $res->id;
       $add->product_id = $items->product_id;
       

       $add->unit_price = $items->price;
       $add->quantity = $items->quantity;
       $add->save();
        }


        $admin_order = [
            'title' => $request->input('fname'),
            'email' => $request->input('email'),
            'subject' => 'Order',
            'product' => $res->id,
        ];
        $cus_details = [
            'title' =>  $request->input('fname'),
            'subject' =>'Order',
            'order' => $res->id,

        ];

        \Mail::to('arslanehsan464@gmail.com')->send(new \App\Mail\OrderMail($admin_order));
        \Mail::to($res->email)->send(new \App\Mail\CustomerMail($cus_details));

        $this->descart();


            return view('thankyou');
        
    }

    public function descart() {
                     
        CartItems::where('user_id',$this->userid())->delete();
        // CartItems::destroy($user_id,$this->userid());

    }



// show order function



public function myaccount(Orders $orders, User $user){


     $record = Orders::select('id','total_amount','items','created_at')
     ->where('orders.user_id', $this->userid())->get()->sortDesc();

    $data = User::find($this->userid());

    return view('myaccount', compact(['record','data']));

    
}



// show order details


public function orderdetails(Orders $orders, Products $products, OrderDetails $orderdetails , $id){

 $data =[ 'record' => Products::join('order_details', 'products.id', '=', 'order_details.product_id')
 ->join('orders', 'orders.id','=', 'order_details.order_id')
 ->select('order_details.product_id','products.product_name','products.product_color','products.product_size', 'products.product_image',
 'order_details.unit_price', 'order_details.quantity')
 ->where('orders.id' , $id)
 ->where('orders.user_id' , $this->userid())
 ->get()];


 return view('orderdetails' , $data);
}

}
