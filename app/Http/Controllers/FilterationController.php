<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Category;
use App\SubCategory;
use App\Http\Controllers\ProductsController;
class FilterationController extends Controller
{
    public $cart_controller;

    public function __construct()
    {
        $this->product_controller = new CartController;
    }


    public function filtercategory( Products $products, Category $category , SubCategory $subcategory, $id){

        $record= Products::where('category_id' , $id)->paginate(5);
        // dd($);
        $menu = Category::all();
         $submenu = SubCategory::all();
        $count = $this->product_controller->wish();
        $count2 = $this->product_controller->carticon();
        return view('shop' ,compact(['record' , 'menu', 'submenu','count','count2']));

        // return view('cart');
    }


    public function filtersubcategory(Products $products, Category $category, SubCategory $subcategory, $id){

        $record= Products::where('subcategory_id' , $id)->get();
     $menu = Category::all();
         $submenu = SubCategory::all();
        
        return view('shop',compact(['record','menu','submenu']));

        // return view('category' , $recordarr);
    }



     public function filterByPrice(Request $request){
          $max_price = (int)$request->input('max'); 
          
          $min_price = (int)$request->input('min');
           $record = Products::whereBetween('product_price', [$min_price, $max_price])
           ->paginate(5);
            $menu = Category::all();
            $submenu = SubCategory::all();
           $count = $this->product_controller->wish();
           $count2 = $this->product_controller->carticon();
           return view('shop' ,compact(['record' , 'menu', 'submenu','count','count2']));

     }
        public function filterBySize(Request $request){
          $product_size = $request->input('size'); 
          $record = Products::where('product_size',$product_size)
          ->paginate(5);
          $menu = Category::all();
          
          $submenu = SubCategory::all();
          $count = $this->product_controller->wish();
          $count2 = $this->product_controller->carticon();
          return view('shop' ,compact(['record' , 'menu', 'submenu','count','count2']));
        }


        public function sortByPrice(Request $request)
        
        {
            $record = Products::OrderBy('discounted_price')->select('products.*')->paginate(5);
    
        $menu = Category::all();
        $submenu = SubCategory::all();
        $count = $this->product_controller->wish();
        $count2 = $this->product_controller->carticon();
        return view('shop' ,compact(['record' , 'menu', 'submenu','count','count2']));

        }
        public function sortByDate(Request $request)
        
        {
            $record = Products::OrderBy('created_at', 'desc')->select('products.*')->paginate(5);
    
        $menu = Category::all();
        $submenu = SubCategory::all();
        $count = $this->product_controller->wish();
        $count2 = $this->product_controller->carticon();
        return view('shop' ,compact(['record' , 'menu', 'submenu','count','count2']));

        }

}
