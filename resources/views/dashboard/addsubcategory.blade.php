
@extends('dashboard.dashboard_layout')

@section('title' , 'Admin - AddSubCategory')

@section('admin_content')


    
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">

		
		    <div class="container-xl">			    
			    <h1 class="app-page-title">New SubCategory</h1>
			    <hr class="mb-4">
                <div class="row settings-section justify-content-center">
	                
	                <div class="col-6">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
								
							    <form class="settings-form" method="post" action="addsubcat">
                  @csrf
				  <div class="row">
                   <div class="col-lg-12">
				                     <div class="mb-3">
									    <label for="setting-input-1" class="form-label">Name</label>
									    <input type="text" name="name"  class="form-control" id="setting-input-1"  required>
									</div>
										
							<button type="submit" value="Submit" name="submit" class="btn app-btn-primary" >Add</button>
				

				   </div>

				  </div>
							
               			    </form>
						    </div><!--//app-card-body-->

	                </div>
                </div><!--//row-->
                					    
						</div><!--//app-card-->
	                </div>					    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
			    <hr class="my-4">
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    
    </div><!--//app-wrapper-->    					
@endsection