
@extends('dashboard.dashboard_layout')

@section('title' , 'editProduct')

@section('admin_content')


    
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">

		
		    <div class="container-xl">			    
			    <h1 class="app-page-title">New Product</h1>
			    <hr class="mb-4">
                <div class="row settings-section ">
	                
	                <div class="col-12 ">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
								@if($list)
							    <form class="settings-form" method="post"  action="{{route('updateproduct',[$list->id])}}"   enctype="multipart/form-data">
                  @csrf

<div class="row">

<div class="col-lg-6">
<div class="mb-3">
									    <label for="setting-input-1" class="form-label">Name</label>
									    <input type="text" name="name" value="{{$list->product_name}}" class="form-control" id="setting-input-1"  required>
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Description</label>
									    <input type="text" name="description" value="{{$list->product_description}}" class="form-control" id="setting-input-2"  required>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Price</label>
									    <input type="text" name="price"
                                        value="{{$list->product_price}}"
                                        class="form-control" id="setting-input-3" >
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Color</label>
									    <input type="text" name="color" 
                                        value="{{$list->product_color}}" class="form-control" id="setting-input-3" >
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Size</label>
									    <input type="text" name="size" 
                                        value="{{$list->product_size}}"
                                        class="form-control" id="setting-input-3" >
                      </div>

</div>
<div class="col-lg-6">

<div class="mb-3">
                  <label for="setting-input-3" class="form-label">Category</label>
                  <select class="form-control"  name="product_id">

				  @foreach ($menuArr as $value)

@if($value->id == $list->category_id)

    <option value="{{ $value->id }}">{{ $value->category_name }} </option>
@endif
@endforeach
    @foreach ($menuArr as $value)

	
        <option value="{{ $value->id }}" > 
            {{ $value->category_name }} 
        </option>

        @endforeach    
    </select> 
    </div>
    <div class="mb-3">
    <label for="setting-input-3" class="form-label">SubCategory</label>
<select class="form-control " value="{{$list->subcategory_id}}"  name="pproduct_id">

<?php
 $catCounter = 0;

?>

@foreach ($submenuArr as $value)

@if($value->id == $list->subcategory_id)

    <option value="{{ $value->id }}">{{ $value->subcategory_name }} </option>
	<?php
 $catCounter = 1;

?>

@endif
@endforeach
<?php
 if($catCounter == 0)
 {
?>

<option value="">Select</option>
<?php }?>

    
    @foreach ($submenuArr as $value)
        
        <option value="{{ $value->id }}"> 
            {{ $value->subcategory_name }} 
        </option>
        @endforeach    
    </select> 
    
    </div>
    <?php 
if(isset($_POST['product_id']))
    {echo "hi: ";}
    ?>
<div class="mb-3">
									    <label for="setting-input-3" class="form-label">Discount</label>
									    <input type="text" name="discount"
                                        value="{{$list->discount}}"
                                        class="form-control" id="setting-input-3" >
									</div>

								

<div class="mb-3 mt-2">
<img src="{{secure_asset('/uploads/'.$list->product_image)}}" alt="" style="width: 50px;">
</div>

      <div class="mb-3 mt-2">
      <label class="form-label">Image:</label>
      <input class="form-control" type="file" id="formFile" name="file" value="" >
      </div>
									<button  type="submit" value="Submit" name="submit" class="btn app-btn-primary" >Update</button>
							 

</div>

</div>
								
   </form>

                                @endif
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