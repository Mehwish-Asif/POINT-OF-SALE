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
     <style>
    @media print {
        .btn {
            display: none;
        }
    }
</style>

<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; margin-bottom: 20px;">
    <div class="btn-container">
        <a href="{{ route('transaction.index') }}" class="btn btn-danger">All</a>
        <a href="{{ route('transaction.filter', ['interval' => 'daily']) }}" class="btn btn-danger">Daily</a>
        <a href="{{ route('transaction.filter', ['interval' => 'weekly']) }}" class="btn btn-danger">Weekly</a>
        <a href="{{ route('transaction.filter', ['interval' => 'monthly']) }}" class="btn btn-danger">Monthly</a>
        <a href="{{ route('transaction.filter', ['interval' => 'yearly']) }}" class="btn btn-danger">Yearly</a>
    </div>
    <div>
        <a href="#" onclick="window.print();" class="btn btn-primary">Print All</a>
    </div>
</div>




     <table class="table table-striped">
  <thead>
    <tr>
            <th scope="col">Customer</th>
            <th scope="col">Transaction Amount</th>
            <th scope="col">Paid Amount</th>
            <th scope="col">Balance</th>
            <th scope="col">Transaction Date</th>
            <th scope="col">Payment Method</th>
    </tr>
  </thead>
  <tbody>
  @foreach($transac as $transaction)
        <tr>
        <td>
                @if($transaction->order)
                    {{ $transaction->order->name }}
                @else
                    No Order
                @endif
            </td>
            <td>{{ $transaction->transac_amount }}</td>
            <td>{{ $transaction->paid_amount }}</td>
            <td>{{ $transaction->balance }}</td>
            <td>{{ $transaction->transac_date }}</td>
            <td>{{ $transaction->payment_method }}</td>
        </tr>
        @endforeach
  </tbody>
</table>
      @include('admindashboard.script')
   </body>
</html>