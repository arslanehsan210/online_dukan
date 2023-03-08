
@extends('dashboard.dashboard_layout')

@section('title' , 'Admin - SubCategoriesList')

@section('admin_content')


    
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">

		
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Categories List</h1>
			    <hr class="mb-4">
                <div class="row xl-5 justify-content-center">
            <div class="col-lg-5 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0 bg-white">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th class="align-middle">ID</th>
                            <th class="align-middle" >Name</th>
                            <th class="align-middle"><a style=" text-decoration: none;" href="subcatform"><button class="btn btn-primary ">Add SubCategory</button>
                                    </a></th>
                            


                        </tr>
                    </thead>
                    <tbody>

                    <?php

$count =0;
?>
                    @foreach($list as $items)
                    
                    <?php

									$count +=1;
									?>
                    <tr>
                          <td class="align-middle">{{$count}}</td>
                          <td class="align-middle">{{$items->subcategory_name}}</td>
                        

                          <td class="align-midddle">
                         
                       
                       <a href="{{route('deletesubcategory', [$items->id])}}"
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