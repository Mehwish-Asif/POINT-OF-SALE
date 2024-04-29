@include('admindashboard.style')
<!-- Sidebar  -->
@include('admindashboard.nav')
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               @include('admindashboard.topbar')
               <!-- end topbar -->
    
<body class="dashboard dashboard_1">
 
                  

              <div class="container">
              <div class="row">
              <div class="col-6">
              <h1 style="margin-left: 170px; margin-top: 20px;">Add Product</h1>

 <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf
    
     <div class="row">
 
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="product_name" class="form-control" placeholder="Name" />
            </div>
            @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Brand:</strong>
                <input type="text" name="brand" class="form-control" placeholder="Name" />
            </div>
            @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="number" name="price" class="form-control" placeholder="Name" />
            </div>
            @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="number" name="quantity" class="form-control" placeholder="Name" />
            </div>
            @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="stock"><strong>Stock:</strong></label>
        <input type="number" name="alert_stock" class="form-control" placeholder="Stock">
    </div>
    @error('stock')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" cols="75" rows="4"></textarea>
    </div>
    @error('description')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </div>
     
</form>

</div>
</div>

@include('admindashboard.script')