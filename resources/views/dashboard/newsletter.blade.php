
@extends('dashboard.dashboard_layout')

@section('title' , 'Admin - Subscriptions')

@section('admin_content')


    
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">

		
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Subcriptions</h1>
			    <hr class="mb-4">
                <div class="row xl-5 justify-content-center">
            <div class="col-lg-5 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0 bg-white">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th class="align-middle">No</th>
                            <th class="align-middle" >Email</th>
                            
                            


                        </tr>
                    </thead>
                    <tbody>

                    @foreach($list as $key => $items)
                    
                    <tr>
                          <td class="align-middle">{{$key+1}}</td>
                          <td class="align-middle">{{$items->email}}</td>
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