
@extends('dashboard.dashboard_layout')

@section('title' , 'Admin - CustomersListing')

@section('admin_content')


    
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">

		
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Customers List</h1>
			    <hr class="mb-4">
                <div class="row xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0 bg-white">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th class="align-middle">No#</th>
                            <th class="align-middle">User ID</th>
                            <th class="align-middle" >Name</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Mobile</th>
                            <th class="align-middle">Phone</th>
                            <th class="align-middle">Address</th>
                        <th></th>


                        </tr>
                    </thead>
                    <tbody>

                    <?php
                     $count =0;
                     ?>

                    @foreach($list as $key => $items)
                    
                    <?php
                     $count +=1;
                     ?>

                    <tr>
                            <td class="align-middle">{{$count}}</td>
                            <td class="align-middle">{{$items->id}}</td>
                            <td class="align-middle">{{$items->name}}</td>
                            <td class="align-middle">{{$items->email}}</td>
                            <td class="align-middle">{{$items->mobile}}</td>
                            <td class="align-middle">{{$items->phone}}</td>
                            <td class="align-middle">{{$items->address}}</td>

                     
                       <td class="align-midddle">
                        @if($items->authentication == 1)
                       <a style=" text-decoration: none;" href="{{route('cutomerunapprove' , [$items->id])}}"><button class="btn btn-primary ">Approve</button>
                               
                    </a> 
                    @else
                                    <a style=" text-decoration: none;" href="{{route('cutomerapprove' , [$items->id])}}"><button class="btn btn-danger ">UnApprove</button>
                                    </a> 
@endif
                            

                        
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