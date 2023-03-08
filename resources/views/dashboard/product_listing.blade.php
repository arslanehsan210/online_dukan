
@extends('dashboard.dashboard_layout')

@section('title' , 'Admin - ProductListing')

@section('admin_content')


    
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">

		
		    <div class="container-xl">			    
			    <h1 class="app-page-title">New Product</h1>
			    <hr class="mb-4">
                <div class="row xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0 bg-white">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            
                            <th class="align-middle">No#</th>
                            <th class="align-middle">Product ID</th>
                            <th class="align-middle" >Image</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Category</th>
                            <th class="align-middle">SubCategory</th>
                            <th class="align-middle">Color</th>
                            <th class="align-middle">Size</th>
                            <th class="align-middle" >Price</th>
                            <th class="align-middle">Off</th>
                            <th class="align-middle"><a style=" text-decoration: none;" href="{{route('addd')}}"><button class="btn btn-primary ">Add Product</button>
                                    </a></th>


                        </tr>
                    </thead>
                    <tbody>

                    @foreach($list as $key => $items)
                    
                    <tr>
                    <td class="align-middle">{{$key + 1}}</td>
                    <td class="align-middle">{{$items->id}}</td>
                            <td class="align-middle"><img src="{{secure_asset('/uploads/'.$items->product_image)}}" alt="" style="width: 50px;"> </td>
                            <td class="align-middle">{{$items->product_name}}</td>
                            <td class="align-middle">{{$items->category_name}}</td>

                 <?php  
                 if(is_null($items->subcategory_id) )
                 {
                 ?>
                 <td class="align-middle"> - </td>
                 <?php 
                 }
                 else{
                 ?>
                <td class="align-middle">{{$items->subcategory_name}}</td>                       
                <?php
                 }?>            
                            
                            <td class="align-middle">{{$items->product_color}}</td>
                            <td class="align-middle">{{$items->product_size}}</td>
                            <td class="align-middle">{{$items->product_price}}</td>

                            
                            <?php  
                             if(is_null($items->discount) )
                             {
                             ?>
                             <td class="align-middle"> $0 </td>
                             <?php 
                             }
                             else{
                             ?>
                                <td class="align-middle">${{$items->discount}}</td>                    
                             <?php
                             }?>            


                     
                       <td class="align-midddle">
                         
                       <a href="{{route('editproduct', [$items->id])}}"
                       
                       ><button id="del"
                            class="btn btn-sm btn-primary">   <i class="fa-solid fa-pen-to-square"></i></button></a> 
                       <a href="{{route('deleteproduct', [$items->id])}}"
                       onclick="return confirm('Are you sure?')"
                       ><button id="del"
                            class="btn btn-sm btn-primary">   <i class="fa fa-times"></i></button></a> 

                            

                        
                        </td>
                            
                        </tr>

                    @endforeach
                    </tbody>
                    
                </table>
            </div>
            
        </div>
			    <hr class="my-4">
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    
    </div><!--//app-wrapper-->    					
@endsection