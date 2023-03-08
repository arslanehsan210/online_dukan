<div class="container col-3 mt-5">

<br><br>
<a  href="record" ><button class="btn btn-primary btn-lg btn-block chek"  >Back</button> </a>

    <br><br>

<form method="post" action="submitted"   enctype="multipart/form-data">
  @csrf
      <div class="mb-3">
        <label for="nam" class="form-label">Product Name:</label>
        <input name="name" type="text"class="form-control required" id="nam">
      </div>
      
      <div class="mb-3">
        <label for="num" class="form-label">Description:</label>
        <input type="text" class="form-control" name="phone" id="num" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="num" class="form-label">Price:</label>
        <input type="text" class="form-control" name="price" id="num" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="num" class="form-label">Color:</label>
        <input type="text" class="form-control" name="color" id="num" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="num" class="form-label">Size:</label>
        <input type="text" class="form-control" name="size" id="num" aria-describedby="emailHelp">
      </div>


    
 
      <select class="form-control" name="product_id">
    <option value="">Select Category</option>
    @foreach ($menuArr as $value)
        <option value="{{ $value->id }}" > 
            {{ $value->category_name }} 
        </option>
        @endforeach    
    </select> 

<select class="form-control mt-3" name="pproduct_id">
    <option value="">Select SubCategory</option>
    @foreach ($submenuArr as $value)
        
        <option value="{{ $value->id }}"> 
            {{ $value->subcategory_name }} 
        </option>
        @endforeach    
    </select> 

    <?php 
if(isset($_POST['product_id']))
    {echo "hi: ";}
    ?>


<div class="mb-3">
        <label for="discount" class="form-label">Discount:</label>
        <input type="text" class="form-control" name="discount" id="discount" placeholder="For Example 20">
      </div>

      <div class="mb-3 mt-2">
      <label class="form-label">Image:</label>
      <input class="form-control" type="file" id="formFile" name="file" value="" >
      </div>
      
  

      <input type="submit"  value="Submit" name="submit" class="mt-3" >
    </form>
</div>