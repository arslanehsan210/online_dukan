<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Reviews;
use App\Products;
class ReviewController extends Controller
{
 

    // public function userid(){
    //     $user = Auth::user();
    //     if($user){
    //     return $user->id;
    //     }
    //     else{
    //         return 0;
    //     }
    // }

public function reviewForm(Request $request){

    $user = Auth::user();
    $res = new Reviews;
    $res->product_id = $request->input('product_id');
    $res->cus_name = $user->name;
    $res->user_id = $user->id;
    $res->message= $request->input('message'); 
    $res->rating= $request->input('product_rating'); 
    $res->save();
   return redirect()->back();
}



    
}
