
@extends('dashboard.dashboard_layout')

@section('title' , 'Admin - OrderDetails ')

@section('admin_content')


    
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">

		
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Customer Details</h1>
			    <hr class="mb-4">
                <div class="row xl-5">
            <div class="col-lg-12 table-responsive mb-5">

            <div class="card mb-4">
          <div class="card-body">
            @foreach($list as $items)
            <div class="row">
              <div class="col-sm-6 text-center">
                <p class="mb-0">Customer ID</p>
              </div>
              <div class="col-sm-6 text-center">
                <p class="text-muted mb-0">{{$items->user_id}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6 text-center">
                <p class="mb-0">First Name</p>
              </div>
              <div class="col-sm-6 text-center">
                <p class="text-muted mb-0">{{$items->first_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6 text-center">
                <p class="mb-0">Last Name</p>
              </div>
              <div class="col-sm-6 text-center">
                <p class="text-muted mb-0">{{$items->last_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6 text-center">
                <p class="mb-0"><th class="align-middle">Email</th></p>
              </div>
              <div class="col-sm-6 text-center">
                <p class="text-muted mb-0">{{{$items->email}}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6 text-center">
                <p class="mb-0"><th class="align-middle">Mobile</th></p>
              </div>
              <div class="col-sm-6 text-center">
                <p class="text-muted mb-0">{{{$items->mobile_no}}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-6 text-center">
                <p class="mb-0"><th class="align-middle">Address 1</th></p>
              </div>
              <div class="col-sm-6 text-center">
                <p class="text-muted mb-0">{{{$items->address_1}}}</p>
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-6 text-center">
                <p class="mb-0"><th class="align-middle">Country</th></p>
              </div>
              <div class="col-sm-6 text-center">
                <p class="text-muted mb-0">{{{$items->country}}}</p>
              </div>
            </div>
            
        @endforeach
          </div>
        </div>

                
            </div>
            
        </div>
        <h1 class="app-page-title">Order</h1>
			    <hr class="mb-4">
        <div class="row xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0 bg-white">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th class="align-middle">Order ID</th>
                            
                            <th class="align-middle">Total Items</th>
                            <th class="align-middle">Shipping</th>
                           <th class="align-middle">Total Amount</th>
                            

                        </tr>
                    </thead>
                    <tbody>

                    @foreach($list as $items)
                    
                    <tr>
                    <td class="align-middle">{{$items->id}}</td>
                    <td class="align-middle">{{$items->items}}</td>
                    <td class="align-middle">10</td>
                    <td class="align-middle">{{$items->total_amount}}</td>

                        
                        </tr>

                    @endforeach
                    </tbody>
                    
                </table>
            </div>
            
        </div>


        <h1 class="app-page-title">Order Details</h1>
			    <hr class="mb-4">
        <div class="row xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0 bg-white">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th class="align-middle">Product</th>
                            <th class="align-middle">Image</th>
                            <th class="align-middle">Color</th>
                           <th class="align-middle">Size</th>
                           <th class="align-middle">Unit Price</th>
                           <th class="align-middle">Quantity</th>
                           <th class="align-middle">Discount</th>
                           
                            

                        </tr>
                    </thead>
                    <tbody>

                    @foreach($record as $items)
                    
                    <tr>
                    <td class="align-middle"><img src="{{secure_asset('/uploads/'.$items->product_image)}}" alt="" style="width: 50px;"> </td>
                    <td class="align-middle">{{$items->product_name}}</td>
                    <td class="align-middle">{{$items->product_color}}</td>
                    <td class="align-middle">{{$items->product_size}}</td>
                    <td class="align-middle">{{$items->unit_price}}</td>
                    <td class="align-middle">{{$items->quantity}}</td>
                    


                    <?php  
                             if(is_null($items->discount) )
                             {
                             ?>
                             <td class="align-middle"> --</td>
                             <?php 
                             }
                             else{
                             ?>
                                <td class="align-middle">{{$items->discount}}</td>                   
                             <?php
                             }?>   
                        
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