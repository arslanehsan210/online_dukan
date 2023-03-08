<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products;
use App\Orders;
use App\OrderDetails;
use App\ContactData;
use App\User;
use App\NewsLetter;

use Illuminate\Support\Facades\Auth;

class AdminOrders extends Controller
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


     public function ordersListing()
     {
        $data= ['list'=> Orders::all()->reverse()];
        return view('dashboard.orders_listing' ,$data);
     }


     public function orderDetails(Orders $orders, Products $products, OrderDetails $orderdetails , $id){





      $record = Products::join('order_details', 'products.id', '=', 'order_details.product_id')
      ->join('orders', 'orders.id','=', 'order_details.order_id')
      ->select('products.product_name','products.product_color','products.product_size', 'products.product_image','products.discount',
      'order_details.unit_price', 'order_details.quantity')
      ->where('orders.id' , $id)->get();

$list = Orders::where('id', $id)->get();


return view('dashboard.admin_orderdetail' ,compact(['record', 'list']));

  }


public function cus_msg_list(){
$data = ['list' => ContactData::all()->sortDesc()];

return view('dashboard.customer_message' , $data);
}

public function del_cus_msg($id){

   ContactData::where('id',$id)->delete();

   return redirect('messagelisting');

}

 public function users_listing(){

   $data = ['list' => User::all()->where('user_role' , 1)->reverse()];

   return view('dashboard.users_listing' , $data);

 }


 public function approve($id){

   $res = User:: find($id);

   $res->authentication = 1;
   $res->save();
   return redirect('customerlisting');
 } 
 public function unapprove($id){

   $res = User:: find($id);

   $res->authentication = 0;
   $res->save();
   return redirect('customerlisting');
 } 

 public function orderPaid($id){

  $res = Orders:: find($id);

  $res->payment = 'Paid';
  $res->save();
  return redirect('orderslisting');
} 
 public function orderPending($id){

  $res = Orders:: find($id);

  $res->payment = 'Pending';
  $res->save();
  return redirect('orderslisting');
} 

 public function total_sale(){

$total_sale = Orders::sum('total_amount');


$total_orders = Orders::count('id');
$total_customers = User::where('user_role','1')->count();
$total_products  = Products::count('id');
 

return view('dashboard.overview', compact(['total_sale','total_orders','total_customers','total_products']));
 }


 public function subscription(){

  $data = ['list' => NewsLetter::all()];
  return view('dashboard.newsletter' , $data);
  
  
 }


}
