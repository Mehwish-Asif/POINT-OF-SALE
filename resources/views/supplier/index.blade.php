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
   

     <a href="{{action('App\Http\Controllers\SupplierController@create')}}" class="btn btn-danger" style="margin-top: 20px; margin-bottom: 20px;">Add Supplier</a>

     <table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">S No</th>
      <th scope="col">Supplier_Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Company</th>
    </tr>
  </thead>
  <tbody>
  @foreach($supplier as $key => $sup)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $sup->supplier_name }}</td>
        <td>{{ $sup->email }}</td>
        <td>{{ $sup->phone }}</td>
        <td>{{ $sup->eddress }}</td>
        <td>{{ $sup->company }}</td>

        <td>
</td>
    </tr>
@endforeach
  </tbody>
</table>
      @include('admindashboard.script')
   </body>
</html>