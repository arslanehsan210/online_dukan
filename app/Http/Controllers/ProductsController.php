<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Products;
use App\Category;
use App\SubCategory;
use App\Wishlist;
use App\CartItems;
use App\ContactData;
use App\NewsLetter;
use App\Reviews;
use App\Orders;
use App\OrderDetails;

use Illuminate\Http\Request;
use App\Http\Controllers\CartController;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
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
        $cart_controller = new CartController;
        $d= Wishlist::where('user_id',$cart_controller->userid())
        ->get();
         
        foreach($d as $items)
       {
          $count +=$items->counter;
        }     
        return $count;  
  
     }

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


    public function homeshow(Products $products, Category $category, SubCategory $subcategory)
    {// $data = ['record'=> Products::all()];
        
        $menu = Category::all();
        $submenu =   SubCategory::all();

        $record = Products::all();

                   
        $count = $this->wish();
        $count2 = $this->carticon();
        return view('home',compact(['menu','submenu','record','count','count2']));
        // return view('addproduct',$menu);

        
        // return view('shop' , compact(['record' , 'menu', 'submenu']));
    }
    
    

    public function create(Category $category, SubCategory $subcategory)
    {// $data = ['record'=> Products::all()];
        $menuArr = Category::all();
        $submenuArr =   SubCategory::all();
        return view('dashboard.addproduct',compact(['menuArr','submenuArr']));
        // return view('addproduct',$menu);

        
        // return view('shop' , compact(['record' , 'menu', 'submenu']));
    }
    


    public function store(Request $request)
    {
        $percentage = "";
        
        $res = new Products;
        $res->product_name = $request->input('name');
        $res->product_description = $request->input('description');
        $res->product_price = $request->input('price');
        $res->discount = $request->input('discount');
        
        $percentage = ceil($request->input('price') * ($request->input('discount'))/100);
        $res->discounted_price  = ($request->input('price') - (int)$percentage);

        $res->product_color = $request->input('color');
        $res->product_size = $request->input('size');
        $res->category_id = $request->input('product_id');
        $res->subcategory_id = $request->input('pproduct_id');
        

        

        if($request->hasfile('file'))
        {
             


            $file = $request->file('file');
            $extension =$file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('public/uploads/',$filename);
            $res->product_image = $filename;
        

    }
    $res->save();
        $request->session()->flash('msg','product is added');
        
        return redirect('listing');
    }

    
    public function show(Products $products,  Category $category , SubCategory $subcategory)
    {
        // $data = ['record'=> Products::all()];
        $record = Products::paginate(9);
        
        $menu = Category::all();
        $submenu = SubCategory::all();
       
        $count = $this->wish();
        $count2 = $this->carticon();
        return view('shop' , compact(['record' , 'menu', 'submenu','count','count2']));

        
    }

    public function productdetails($id){

         $record= Products::find($id);
         $review = Reviews::where('product_id',$id)->get();


         $addReview = Orders::join('order_details','orders.id', '=','order_details.order_id')
         ->select('order_details.product_id')
         ->where('order_details.product_id' , '=' , $id)
         ->where('orders.user_id', $this->userid())
         ->get();

$r = Reviews::where('user_id',$this->userid())
->where('product_id',$id)->get();

$rr = count($r);

         $countR = count($review);
         $menu = Category::all();
         $submenu = SubCategory::all();

         $count = $this->wish();
         $count2 = $this->carticon();
         $record1 = Products::where('discount','>','0' )->get();
        
        return view('productdetails',compact(['rr','addReview','record','menu','submenu','count','count2','record1','review','countR']));

    }


  
    public function contact()
    {
        $count = $this->wish();
        $count2 = $this->carticon();
        return view('contact' , compact(['count','count2']));
    }

///// contact form

    public function contactForm(Request $request)
    {
               $res = new ContactData;
               

        $details = [
            'title' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'body' => $request->input('textarea'),
        ];
       
        $res->title = $request->input('name');
        $res->email = $request->input('email');
        $res->subject = $request->input('subject');
        $res->body = $request->input('textarea');
        $res->save();

 \Mail::to('arslanehsan464@gmail.com')->send(new \App\Mail\SendMail($details));
       
  return $this->contact();
    }

    



///// News Letter  form  ////////

public function newsletterform(Request $request){

    
       $res = new NewsLetter;
       $res->email = $request->input('mail');
      $res->save();
      
     
 return redirect('/');
}


// seacrh shop


    public function searchshop(Request $request){


    //     $d = $request->input('search');
    //     $searchValues = explode(' ',$d);
      
    //   $str1 = '';
    //   $str2 = '';
    //   $counter = count($searchValues)-1;
    // //   if($searchValues > 1){
    //   foreach($searchValues as $key => $value)
    //      {  
          
             
    //         // if( $counter == $key){
    //         //     $str2 .= "product_name LIKE '%$value%'";
    //         //     $str1 .= "(product_name LIKE '%$value%')";
    //         // }
    //         // else{
    //             $str1 .= "(product_name LIKE '%$value%') + ";
    //             $str2 .= "product_name LIKE '%$value%' OR ";
    //     //    }
    //     }
    // // }
    // //   dd($str1);
      
    //   $record = DB::select("
    //       SELECT 
    //     *,
    //      ($str1 (product_name LIKE '%$d%')) as total
    //   FROM products WHERE ( 
    //   ($str2 (product_name LIKE '%$d%')  ) 
    //   )
    //   ORDER BY total DESC,
    //    CASE
    //   WHEN product_name LIKE '".$d."' THEN 1
    //     WHEN product_name LIKE '".$d."%' THEN 2
    //     WHEN product_name LIKE '%".$d."%' THEN 3
    //     WHEN product_name LIKE '%".$d."' THEN 4
    //     END
    //     "
    //   );

// DB::enableQueryLog();
// $collection = collect($record);

// // $record = $collection->sortBy("



    //     $d = $request->input('search');
    //     $searchValues = explode(' ',$d);
      
    //   $str1 = '';
    //   $str2 = '';
      
      
    //   foreach($searchValues as $key => $value)
    //      {  
          
             
    //         if( $counter == $key){
    //             $str1 .= "(product_name LIKE '%$value%')";
    //             $str2 .= "(product_name LIKE '%$value%')";
    //         }
    //         else{
    //             $str1 .= "(product_name LIKE '%$value%') + ";
    //             $str2 .= "(product_name LIKE '%$value%') OR ";
    //        }
        
    // }
    
    // foreach($searchValues as $q){
    //     $str1 .= "(product_name LIKE '%$q%') + ";
    //     $str2 .= "(product_name LIKE '%$q%') OR ";
    // }
    // $t=trim($str1,'+ ');
    // $j = trim($str2,'OR ');

////////////////////////////////////////////////////////////////////// ccc///////////////
//   $d = $request->input('search');
//         $searchValues = explode(' ',$d);
      
//       $str1 = '';
//       $str2 = '';
      

//     $counter = count($searchValues)-1;

//   foreach($searchValues as $key => $value)
//          {  
          
             
//             if( $counter == $key){
//                 $str2 .= "(product_name LIKE '%$value%')";
//                 $str1 .= "(product_name LIKE '%$value%')";
//             }
//             else{
//                 $str1 .= "(product_name LIKE '%$value%') + ";
//                 $str2 .= "(product_name LIKE '%$value%') OR ";
//            }
//         }

//     // dd($t,$j);

      
//       $record = DB::select("
//           SELECT 
//         *,
//          ($str1) 
//       FROM products WHERE ( 
//       ($str2) 
//       )
//       ORDER BY
//       CASE WHEN product_name LIKE '".$d."' THEN 0 ELSE 1 END,
//       CASE WHEN product_name regexp '(^|[[:space:]])$d([[:space:]]|$)' THEN 0 ELSE 1 END,
//       CASE WHEN product_name LIKE '".$d."%' THEN 0 ELSE 1 END,
//       CASE WHEN product_name LIKE '%".$d."%' THEN 0 ELSE 1 END,
//       CASE WHEN product_name LIKE '%".$d."' THEN 0 ELSE 1 END
//   ");



    //   $var = '';
    //             $var1 = '';
    //             foreach($searchValues as $q){
    //                 $var .= "(product_name LIKE '%$q%') + ";
    //                 $var1 .= "(product_name LIKE '%$q%') OR ";
    //             }
    //             $t=trim($var,'+ ');
    //             $j = trim($var1,'OR ');

    //             // dd($t,$j);
    //                 $products = DB::select(
    //                     "SELECT 
    //                     *,
    //                     ($t) as total
    //                     FROM products WHERE ( 
    //                     ($j)
    //                 ) 
    //                 ORDER BY
    //                 CASE WHEN product_name LIKE '".$search_res."' THEN 0 ELSE 1 END,
    //                 CASE WHEN product_name regexp '(^|[[:space:]])$search_res([[:space:]]|$)' THEN 0 ELSE 1 END,
    //                 CASE WHEN product_name LIKE '".$search_res."%' THEN 0 ELSE 1 END,
    //                 CASE WHEN product_name LIKE '%".$search_res."%' THEN 0 ELSE 1 END,
    //                 CASE WHEN product_name LIKE '%".$search_res."' THEN 0 ELSE 1 END
    //             ");




// CASE
// WHEN product_name LIKE '".$d."' THEN 1
//   WHEN product_name LIKE '".$d."%' THEN 2
//    WHEN product_name LIKE '%".$d."%' THEN 3
//    WHEN product_name LIKE '%".$d."' THEN 4
//   ELSE 5
//   END");

// $record = $collection->sortBy('product_name',0); 


    //  $query = DB::getQueryLog();
    //  dd($query); 






    // DB::enableQueryLog();
 
    // $record = DB::table('products')     
    // ->where($str2)
    // ->get();
    

//       $record = DB::table('products')     
// ->where("product_name" ,"LIKE" , "%$d%")
// ->get();


// $query = DB::getQueryLog();
// dd($query);
// dd($record);


    //   $record = $record->orderByRaw("CASE
    //    WHEN product_name LIKE '".$d."' THEN 1
    //    WHEN product_name LIKE '".$d."%' THEN 2
    //     WHEN product_name LIKE '%".$d."%' THEN 3
    //     WHEN product_name LIKE '%".$d."' THEN 4
    //    ELSE 5
    //    END")->get();

    //    dd($record);
 
    //     $d = $request->input('search');
    //     $searchValues = explode(' ',$d);
      
    //   $str1 = '';
    //   $str2 = '';
    //   $counter = count($searchValues)-1;
      
    //    foreach($searchValues as $key => $value)
    //    {  
        
           
    //       if( $counter == $key){
    //           $str2 .= "product_name LIKE '%$value%'";
    //           $str1 .= "(product_name LIKE '%$value%')";
    //       }
    //       else{
    //           $str1 .= "(product_name LIKE '%$value%') + ";
    //           $str2 .= "product_name LIKE '%$value%' OR ";
    //      }
    //   }
      
    //   $record = DB::select("
    //       SELECT 
    //     product_name,
    //      ($str1 ) as total
    //   FROM products WHERE ( 
    //   $str2    
    //   )
    //   ORDER BY total DESC"
    //   );
    //    dd($record);

    // 1/

    // $len = count($record);
// $newrecord = [];
// $temp= '';
// for($i=0 ; $i < $len ; $i++)
// {

// for($j=1 ; $j < $len ; $j++){
//   if($record[$j - 1] > $record[$j] )
// {
//     $temp = $record[$j - 1];
//     $record[$j - 1] = $record[$j];
//     $record[$j] = $temp;
// }

// }
// }
// dd($record);

    //    $d = $request->input('search');
    //    $searchValues = explode(' ',$d);
     
    //  $str1 = '';
    //  $str2 = '';
    //  $counter = count($searchValues)-1;
     
    //   foreach($searchValues as $key => $value)
    //   {  
       
          
    //      if( $counter == $key){
    //          $str2 .= "product_name LIKE '%$value%'";
    //          $str1 .= "(product_name LIKE '%$value%')";
    //      }
    //      else{
    //          $str1 .= "(product_name LIKE '%$value%') + ";
    //          $str2 .= "product_name LIKE '%$value%' OR ";
    //     }
    //  }
     
    //  $record = DB::select("
    //      SELECT 
    //    product_name,
    //     ($str1 ) as total
    //  FROM products WHERE ( 
    //  $str2    
    //  )
    //  ORDER BY total DESC"
    //  );


    //  dd($record);

//  single  / ///////////////////////////////////////

//      $collection = collect($record);
//     $len = count($record);
// $temp= '';
// for($i=0 ; $i < $len ; $i++)
// {

// for($j=1 ; $j < $len ; $j++){
//   if($collection[$j - 1] < $collection[$j] )
// {
//     $temp = $collection[$j - 1];
//     $collection[$j - 1] = $collection[$j];
//     $collection[$j] = $temp;
// }
// }
// }
// dd($collection);

////////////////////////////////////////////////////////////////////////////

    //   $collection = collect($record);

  
//    $rrrcord = $collection->orderByRaw('product_name');
// $grouped = $collection->groupBy(function ($item, $key) {
//     return substr($item->product_name, 0, 1);
// });

// dd($grouped);
   

//  $record = $record->orderBy('product_name')->get();

    //  collect($feedbacks)->sortByDesc('created_at')->take(5)

//      $collection = collect($record);

  
//      $rrrcord = $collection->sortBy('product_name');

// $rrcord = $rrrcord->values();
//      dd($rrcord);

    //  dd($collection);
    //  dd($record);
// 
//      $grouped = $record->sortBy('product_name');
// dd($grouped);
//  dd($record->product_name);



// foreach($record as $items )
// {
//     dd($items->product_name);
// }

    //   foreach($record as $items)

    //   ("
    //   // CASE
    //   // WHEN product_name LIKE '".$d."' THEN 1
    //   // WHEN product_name LIKE '".$d."%' THEN 2
    //   // WHEN product_name LIKE '%".$d."%' THEN 3
    //   // WHEN product_name LIKE '%".$d."' THEN 4
    //   // ELSE 5
    //   // END")






    // $data = ['record'=> Products::all()];
            //   $record = Products::where('product_name', 'like', '%'.$d.'%')->paginate(10);


// $record = Products::where('product_name', 'like', '%'.$d.'%')
// ->orderByRaw("
// CASE
// WHEN product_name LIKE '".$d."' THEN 1
// WHEN product_name LIKE '".$d."%' THEN 2
// WHEN product_name LIKE '%".$d."%' THEN 3
// WHEN product_name LIKE '%".$d."' THEN 4
// ELSE 5
// END")->paginate(10);



// $record = ::all();




// $record = '';
// foreach($searchValues as $value){

//     $record = Products::where('product_name','LIKE', "%{$d}%")
//  ->orderByRaw(
//      "CASE
//           WHEN product_name LIKE '".$d."' THEN 1
//           WHEN product_name LIKE '".$d."%' THEN 2
//           WHEN product_name LIKE '%".$d."%' THEN 3
//           WHEN product_name LIKE '%".$d."' THEN 4
//           ELSE 5
//           END"
//  )->paginate(10); 

    // }
//  $d = $request->input('search');
//  $searchValues = explode(' ',$d);

// $recorded =[];

// foreach($searchValues as $key => $value)
// {
//     $recorded[$key] = Products::where('product_name','LIKE', "%{$value}%");
// }

// // $record  = asort($recorded);

//  $d = $request->input('search');
//  $searchValues = explode(' ',$d);


// $record = DB::select("
//     SELECT 
//   product_name,
//   (( product_name LIKE '%jeans%')+( product_name LIKE '%shirt%')) as total
// FROM products WHERE ( 
//     product_name LIKE '%jeans%' OR 
//     product_name LIKE '%shirt%' 
// )
// ORDER BY total DESC"
// );

// dd($record);
// $record = [];

// $record = $recordd;
// }
 





// $record  = $record->paginate(10);


// }
//  $record = $record->paginate(10);



//  $total = [];

//  $d = $request->input('search');
//   $searchValues = preg_split('/\s+/', $d, -1); 
//  $record = Products::where(function ($q) use ($searchValues) {
    
//   foreach ($searchValues as $value) {
//    $q->orWhere('product_name', 'like', "%{$value}%"); 
//      }
//    })->orderBy();

// dd($record);
//    $record = $record->orderBy('product_name')->select('products.*')->paginate(10);
// $record = $record->orderByRaw("
// CASE
// WHEN product_name LIKE '".$searchValues."' THEN 1
// WHEN product_name LIKE '".$searchValues."%' THEN 2
//  WHEN product_name LIKE '%".$searchValues."%' THEN 3
//  WHEN product_name LIKE '%".$searchValues."' THEN 4
// ELSE 5
// END")->paginate(10);


// ssssssssssssssssssssss


$d = $request->input('search');
//  $searchValues = preg_split('/\s+/', $d, -1); 
$searchValues = explode(' ',$d);
 $record = Products::where(
    
    function ($q) use ($searchValues) {

 foreach ($searchValues as $value) {
    
    $q->orWhere('product_name', 'like', "%{$value}%");
    
    }
  })->orWhere('product_name', 'like', "%{$d}%");

//   dd($record);

  $record = $record->orderByRaw("
  CASE WHEN product_name LIKE '".$d."' THEN 0 ELSE 1 END,
  CASE WHEN product_name regexp '(^|[[:space:]])$d([[:space:]]|$)' THEN 0 ELSE 1 END,
  CASE WHEN product_name LIKE '".$d."%' THEN 0 ELSE 1 END,
  CASE WHEN product_name LIKE '%".$d."%' THEN 0 ELSE 1 END,
  CASE WHEN product_name LIKE '%".$d."' THEN 0 ELSE 1 END
")->paginate(9);


///////////////////// sssssssssssssssssssssss ///////////
  
// $searchValues = explode(' ',$d);


// foreach($searchValues as $value)
// {
//     $record = Products::where(function(){
//         foreach()
//     } )
// }
// SELECT 
//   name,
//   (( name LIKE '%Wong%')+( name LIKE '%Cackes%') +(name LIKE '%Shop%')) as total
// FROM businesses WHERE ( 
//   name LIKE '%Wong%' OR 
//   name LIKE '%Cackes%' OR
//   name LIKE '%Shop%'
// )
// ORDER BY total DESC



              $menu = Category::all();
              $submenu = SubCategory::all();
             
              $count = $this->wish();
              $count2 = $this->carticon();
              return view('shop' , compact(['record','menu', 'submenu','count','count2']));
         }
}
