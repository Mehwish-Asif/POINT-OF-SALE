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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      @include('admindashboard.style')
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
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

                    
     <!-- table -->
   

     <a href="{{action('App\Http\Controllers\ProductController@create')}}" class="btn btn-danger" style="margin-top: 20px; margin-bottom: 20px;">Add Product</a>

     <table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">S No</th>
      <th scope="col">Product_Name</th>
      <th scope="col">Brand</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Stock</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $key => $product)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->brand }}</td>
        <td>{{ number_format($product->price, 2) }}</td>
        <td>{{ $product->quantity }}</td>
        <td>
            @if($product->alert_stock <= 100)
                <span class="badge badge_danger">Low Stock: {{ $product->alert_stock }}</span>
            @else
                <span class="badge badge_success">{{ $product->alert_stock }}</span>
            @endif
        </td>
        <td>{{ $product->description }}</td>
        <td>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">    @csrf
    @method('DELETE')
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning" style="background-color: grey; border: none;">
    <i class="fas fa-edit"  style="color: white;"></i> <!-- Edit icon -->
</a>
    <button type="submit" class="btn btn-danger" style="background-color: red; border: none;">
        <i class="fas fa-trash-alt"></i> <!-- Delete icon -->
    </button>
</form>
</td>
    </tr>
@endforeach
  </tbody>
</table>
      @include('admindashboard.script')
   </body>
</html>