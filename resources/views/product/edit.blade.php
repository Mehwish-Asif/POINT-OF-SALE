<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      @include('admindashboard.style')
    </head>
    
<body class="dashboard dashboard_1">
    <div class="full_container">
       <div class="inner_container">
         <!-- Sidebar  -->
         @include('admindashboard.nav')
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               @include('admindashboard.topbar')
               <!-- end topbar -->
             <!-- dashboard inner -->
 
             <h1 style="margin-left: 310px; margin-top: 20px;">Edit Product</h1>

			 <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Product Name</label>
        <div class="col-sm-6">
            <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}" />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Brand</label>
        <div class="col-sm-6">
            <input type="text" name="brand" class="form-control" value="{{$product->brand}}" />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Price</label>
        <div class="col-sm-6">
            <input type="number" name="price" class="form-control" value="{{$product->price}}" />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Quantity</label>
        <div class="col-sm-6">
            <input type="number" name="quantity" class="form-control" value="{{$product->quantity}}" />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Stock</label>
        <div class="col-sm-6">
            <input type="number" name="alert_stock" class="form-control" value="{{$product->alert_stock}}" />
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-label-form">Description</label>
        <div class="col-sm-6">
            <input type="text" name="description" class="form-control" value="{{$product->description}}" />
        </div>
    </div>
    <div class="text-center" style="margin-right: 170px;">
        <input type="hidden" name="hidden_id" value="{{ $product->id }}" />
        <input type="submit" class="btn btn-danger" value="Edit Product" />
    </div>    
</form>
</div>
</div>

@include('admindashboard.script')