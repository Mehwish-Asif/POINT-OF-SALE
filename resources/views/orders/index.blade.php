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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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
   
    
     <!-- <a href="{{action('App\Http\Controllers\ProductController@create')}}" class="btn btn-danger">Add Product</a> -->
  
     <form action="{{ route('orders.store') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-md-8">
    <table class="table table-striped">
  <thead>
    <tr>
      <th></th>
      <th scope="col">Product_Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Disc(%)</th>
      <th scope="col">Total</th>
      <th><a href="#" class="btn btn-sm btn-success add_more"><i class="fa fa-plus"></i></a></th>
    </tr>
  </thead>
  <tbody class="addMoreProduct">
    <tr>
      <td>1</td>
      <td>
       
        <select name="product_id[]" class="form-control product_id">
           <option value="">Select Item</option>
          @foreach($products as $product)
          <option data-price="{{$product->price}}" value="{{$product->id}}">{{$product->product_name}}</option>
          @endforeach
        </select>
      </td>   
      <td>
        <input type="number" name="quantity[]" class="form-control quantity">
      </td>
      <td>
        <input type="number" name="price[]" class="form-control price">
      </td>
      <td>
        <input type="number" name="discount[]" class="form-control discount">
      </td>
      <td>
        <input type="number" name="total_amount[]" class="form-control total_amount">
      </td>
      <td>
        <a href="#" class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a>
      </td>
    </tr>
  </tbody>
      </table>
    </div>
    <div class="col-md-4">
  <div class="card">
    <div class="card-header">
      <h4>Total <span class="total">0.00</span></h4>
    </div>
    <div class="card-body">
    <div class="btn-group">
    <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-dark btn-group-item"><i class="fa fa-print"></i> Print</button>
    <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-primary btn-group-item"><i class="fa fa-print"></i> History</button>
    <button type="button" onclick="PrintReceiptContent('print')" class="btn btn-danger btn-group-item"><i class="fa fa-print"></i> Record</button>
  </div>
      <div class="panel">
         <div class="row">
            <table class="table table-striped">
              <tr>
                <td>
                  <label for="">Customer Name</label>
                  <input type="text" name="customer_name" id="" class="form-control">
                  </div>
                </td>
                <td>
                  <label for="">Customer Phone</label>
                  <input type="number" name="customer_phone" id="" class="form-control">
                  </div>
                </td>
              </tr>
            </table>
            <td> Payment Method <br><br>
              <span class="radio-item">
                <input type="radio" name="payment_method" id="payment_method"
                class="true" value="cash" checked="checked">
                <label for="payment_method"> <i class="fa fa-money-bill text-success"></i>Cash<label>
              </span>
              <span class="radio-item">
                <input type="radio" name="payment_method" id="payment_method"
                class="true" value="bank transfer">
                <label for="payment_method"> <i class="fa fa-university text-danger"></i>Bank Transfer<label>
              </span>
              <span class="radio-item">
                <input type="radio" name="payment_method" id="payment_method"
                class="true" value="credit card">
                <label for="payment_method"> <i class="fa fa-credit-card text-info"></i>Credit card<label>
              </span>
            </td><br>
            <td>
              Payment
              <input type="number" name="paid_amount" id="paid_amount" class="form-control"> 
            </td>
            <td>
              Returning Change
              <input type="number" readonly name="balance" id="balance" class="form-control"> 
            </td>
            <td>
              <button class="btn-danger btn-lg btn-block mt-3">Save</button>
            </td>
            <td>
              <a href="https://www.google.com/search?q=calculator" target="_blank" class="btn btn-primary btn-lg btn-block mt-3">Calculator</a>
            </td>
            <br>
            <div class="text-center" style="text-align: center">
              <a href="#" class="text-danger text-center"> <i class="fa fa-sign-out-alt"></i></a>
            </div>
         </div>
      </div>
    </div>
  </div>
</div>   
</form>
@include('admindashboard.script')
<div id="receiptContent" style="display: none;">
    @include('reports.receipt')
</div>
<script>
$('.add_more').on('click', function() {
  var product = $('.product_id').html();
  var numberofrow = $('.addMoreProduct tr').length + 1;
  var tr = '<tr><td class="no">' + numberofrow + '</td>' +
      '<td><select class="form-control product_id" name="product_id[]">' + product +
      '</select></td>' +
      '<td> <input type="number" name="quantity[]" class="form-control quantity"></td>' +
      '<td> <input type="number" name="price[]" class="form-control price"></td>' +
      '<td> <input type="number" name="discount[]" class="form-control discount"></td>' +
      '<td> <input type="number" name="total_amount[]" class="form-control total_amount"></td>' +
      '<td> <a class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a></td>' +
      '</tr>';
  $('.addMoreProduct').append(tr);
});

// Delete row
$('.addMoreProduct').on('click', '.delete', function() {
  $(this).closest('tr').remove();
  TotalAmount(); // Recalculate total amount
});

function TotalAmount() {
  var total = 0;
  $('.total_amount').each(function(i, e) {
    var amount = parseFloat($(this).val()) || 0;
    total += amount;
  });

  $('.total').html(total.toFixed(2)); // Round to two decimal places
}

// Update total amount when product selection changes
$('.addMoreProduct').on('change', '.product_id', function() {
  var tr = $(this).closest('tr');
  var price = parseFloat($('option:selected', this).data('price')) || 0; // Retrieve data-price attribute
  tr.find('.price').val(price.toFixed(2)); // Set price in corresponding input field
  var qty = parseFloat(tr.find('.quantity').val()) || 0;
  var disc = parseFloat(tr.find('.discount').val()) || 0;
  var totalAmount = (qty * price) - ((qty * price * disc) / 100);
  tr.find('.total_amount').val(totalAmount.toFixed(2)); // Set calculated total amount in corresponding input field
  TotalAmount(); // Update total amount
});


$('.addMoreProduct').delegate('.quantity, .discount', 'keyup', function() {
    var tr = $(this).closest('tr');
    var qty = parseFloat(tr.find('.quantity').val()) || 0;
    var disc = parseFloat(tr.find('.discount').val()) || 0;
    var price = parseFloat(tr.find('.price').val()) || 0;
    var total_amount = (qty * price) - ((qty * price * disc) / 100);
    tr.find('.total_amount').val(total_amount.toFixed(2));
    TotalAmount();
});

$('#paid_amount').keyup(function(){
  //alert(1)
    var total = $('.total').html();
    var paid_amount = $(this).val();
    var tot = paid_amount - total;
    $('#balance').val(tot).toFixed(2);
});

//Print section
function PrintReceiptContent() {
    var receiptContent = document.getElementById('receiptContent').innerHTML; // Get the content of reports.receipt

    // Open a new window to print
    var myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=400");
    myReceipt.document.write(receiptContent); // Write the receipt content to the new window
    myReceipt.document.title = "Print Receipt";
    myReceipt.focus();
    myReceipt.print(); // Print the receipt
    setTimeout(() => {
        myReceipt.close();
    }, 8000); // Close the window after printing
}


</script>


</body>
</html>