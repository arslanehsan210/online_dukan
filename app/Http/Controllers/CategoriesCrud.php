<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\SubCategory;


class CategoriesCrud extends Controller
{
    
    public function categoryList(){
        $cat = ['list' =>Category::all()];

        return view('dashboard.category_listing' , $cat);

    }

    public function cateogryForm(){
        return view('dashboard.addcategory');
    }

    public function addcategory(Request $request){
        $res = new Category;
        
        $res->category_name = $request->input('name');
        $res->save();
        return redirect('catlisting');
    }


    public function delCategory($id){


        Category::where('id',$id)->delete();

        return redirect('catlisting');
       }


/////////////////////////////////////////////////////////////////////////////  


    public function subcategoryList(){
        $cat = ['list' =>SubCategory::all()];

        return view('dashboard.subcategory_listing' , $cat);

    }

    public function subcateogryForm(){
        return view('dashboard.addsubcategory');
    }

    public function addsubcategory(Request $request){
        $res = new SubCategory;
        
        $res->subcategory_name = $request->input('name');
        $res->save();
        return redirect('subcatlisting');
    }


    public function delsubCategory($id){


        SubCategory::where('id',$id)->delete();

        return redirect('subcatlisting');
       }
}
