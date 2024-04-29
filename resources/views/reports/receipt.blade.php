<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          #invoice-POS {
            box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
            padding: 10mm; /* Increase padding to increase height */
            margin: 0 auto;
            width: 130mm;
            background: #fff;
        }

        #logo {
            margin: 10px auto;
        }

        .info {
            text-align: center;
            margin-bottom: 20px;
        }

        .info h2 {
            margin: 5px 0;
        }

        #table {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .tabletitle {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .tableitem {
            padding: 5px;
        }

        .Payment {
            text-align: right;
        }

        .legalcopy {
            font-size: 8px;
            text-align: center;
            margin-top: 10px;
        }

        .serial-number {
            font-size: 10px;
            text-align: center;
            margin-top: 20px;
        }

        .serial {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="invoice-POS">
    <!-- Print section-->
    <div id="printed_content">
        <center id="logo">
            <div class="logo"></div>
            <div class="info"></div>
            <h2>POS Ltd</h2>
        </center>
    </div>

    <div class="mid">
        <div class="info">
            <h2>Contact us</h2>
            <p>
                Address : Korangi karachi,
                Email : laravelpos@gmail.com
                Phone : 9253688472
            </p>
        </div>
    </div>
    <!-- end of receipt mid -->

    <div class="bot">
        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item">Item</td>
                    <td class="Hours">Qty</td>
                    <td class="Rate">Unit</td>
                    <td class="Rate">Discount</td>
                    <td class="Rate">Total</td>
                </tr>
                <!-- Your receipt items -->
                @foreach ($order_receipt as $receipt)
                <tr class="service">
                    <td class="tableitem">{{ $receipt->product->product_name }}</td>
                    <td class="tableitem">{{ number_format($receipt->unitprice, 2) }}</td>
                    <td class="tableitem">{{ $receipt->quantity }}</td>
                    <td class="tableitem">{{ $receipt->discount ? '' : '0' }}</td>
                    <td class="tableitem">{{ number_format($receipt->amount, 2) }}</td>
                </tr>
                @endforeach
                <!-- Total row -->
                <tr class="tabletitle">
                    <td class="tableitem"></td>
                    <td class="tableitem"></td>
                    <td class="tableitem"></td>
                    <td class="Rate">Tax</td>
                    <!-- Calculate and display the sum of amounts including tax -->
                    <td class="Payment"><h2>Total $ {{ number_format($order_receipt->sum('amount'), 2) }}</h2></td>
                </tr>

                <tr class="tabletitle">
                    <td class="tableitem"></td>
                    <td class="tableitem"></td>
                    <td class="tableitem"></td>
                    <td class="Rate">Total</td>
                    <!-- Calculate and display the sum of amounts without tax -->
                    <td class="Payment"><h2>{{ number_format($order_receipt->sum('amount'), 2) }}</h2></td>
                </tr>
            </table>

            <div class="legalcopy">
                <p class="legal"><strong>** Thank you for visiting**</strong><br>
                    The good which are subject to trait_exists
                </p>
            </div>
            <div class="serial-number">
                Serial :<span class="serial"> 123456789 </span><br>
                <span> 24/12/2020  &nbsp; &nbsp; 00:45</span>
            </div>
        </div>
    </div>
</div>

</body>
</html>
