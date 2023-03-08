<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;

use Illuminate\Http\Request;
use App\CartItems;
use App\Products;
use App\Wishlist;
use App\View\Components\Topbar;

class WishlistController extends Controller
{
    
  public function carticon(){

    $count2 = 0;
    $cart_controller = new CartController;
    $d= CartItems::where('user_id',$cart_controller->userid())
    ->get();
     
    foreach($d as $items)
   {
      $count2 +=$items->counter;
    }     
    return $count2;  

 }

     public $count = 0;

     
    public function wishlist(Wishlist $wishlist,Products $products){
      $count= 0;

      $cart_controller = new CartController;
      $record = Products::join('wishlist','products.id','=','wishlist.product_id')
      ->select('products.*','wishlist.user_id','wishlist.counter')
      ->where('wishlist.user_id',$cart_controller->userid())
      ->get();
      
       
foreach($record as $items)
{
  $count +=$items->counter;
}       
$count2 = $this->carticon();
        

      return view('wishlist',compact(['record','count','count2']));
            
    }

    public function addtowishlist(Wishlist $wishlist, $id){

      if(Auth::check())
      {

      $cart_controller = new CartController;
            
      if(empty(wishlist::where('product_id', $id )->where('user_id',$cart_controller->userid())->first()))
         {   $data= new Wishlist;
            $data->product_id= $id;
            $data->counter=$data->counter + 1;
            $data->user_id= $cart_controller->userid();
            $data->save();
         }  
         return "yes";
        }
  else{
    return "Please Login!";
  }
      
}
    public function adddtowishlist(Wishlist $wishlist, $id){

        

      if(Auth::check())
      {

      $cart_controller = new CartController;
            
      if(empty(wishlist::where('product_id', $id )->where('user_id',$cart_controller->userid())->first()))
         {   $data= new Wishlist;
            $data->product_id= $id;
            $data->counter=$data->counter + 1;
            $data->user_id= $cart_controller->userid();
            $data->save();
         }  
         return "yes";
        }
  else{
    return "Please Login!";
  }
      
}

    public function sendtocart(Wishlist $wishlist,Products $products, CartItems $cartitems, $id){

      $cart_controller = new CartController;
      
      $d= Wishlist::where('product_id',$id)
      ->where('user_id',$cart_controller->userid())
      ->first();
      $d->counter = 0;
      $d->save();

      $res = Products::find($id);
      $data= new CartItems;
      $data->product_id = $res->id;
      $data->user_id = $cart_controller->userid();
      $data->quantity = 1;
      $data->counter = 1;
      $data->price = $res->product_price;
      $data->total = $res->product_price * $data->quantity;

      $data->save();

       return $this->delwishlist($id);
    }

    public function delwishlist($id)
    {
      $cart_controller = new CartController;
           
      $d= Wishlist::where('product_id',$id)
      ->where('user_id',$cart_controller->userid())
      ->first();
      $d->counter = 0;
      $d->save();

            Wishlist::where('product_id',$id)
            ->where('user_id',$cart_controller->userid())
            ->delete();

      
            return 'Product is removed from wishlist';
    }


}
