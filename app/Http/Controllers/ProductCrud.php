<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products;
use App\Category;
use App\SubCategory;

class ProductCrud extends Controller
{
    

      public function showList(){
                 
            $data = ['list' => Products::join('category' ,'category.id' ,'=', 'products.category_id')
            ->join('subcategory', 'subcategory.id' ,'=', 'products.subcategory_id')
            ->select('products.*' , 'category.category_name' , 'subcategory.subcategory_name')->get()];
            

            return view('dashboard.product_listing' , $data);  
       }


      public function editProduct(Products $product, $id){
        $menuArr = Category::all();
        $submenuArr =   SubCategory::all();


        $list = Products::find($id);

        return view('dashboard.editproduct',compact(['list', 'menuArr', 'submenuArr']));
      }


public function updateProduct(Products $product,Request $request){


    $res = Products::find($request->id);

    $percentage = "";        

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
    return redirect('listing');
}

       public function delProduct($id){


        Products::where('id',$id)->delete();

        return redirect('listing');
       }



}
