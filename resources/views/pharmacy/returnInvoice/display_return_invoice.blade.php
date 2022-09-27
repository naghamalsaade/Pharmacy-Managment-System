<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/18695b64bb.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/popper.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/display_invoice.css')}}">

    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/css/responsive.bootstrap4.min.css')}}">

    <title>Pharmacy</title>
   <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>
  
  @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="display-invoice">
                <div class="card-header card-invoice d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight" style="font-size: 25px;">
                     Return  Invoice # {{$invoice->id}}
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/return-invoice/all-in-pharmacy/list"><button type="button" class="btn btn-list"><i class="fa fa-align-justify"></i> &nbsp;Return Invoice List</button></a>
                    </div>
                </div>
                
            <div class="line2"></div>

            <div class="card">
                <div class="card-body">
                    <div class="header">
                        <div class="row">
                            <i class="fas fa-laptop-medical icone"></i>
                            <h1>Pharma<span class="span-ite">ITE</span></h1>
                        </div>
                        <div class="row">
                            <table class="table table-header">
                                <tbody>
                                    <tr>
                                        <td class="head">Return Invoice Id: </td>
                                        <td>{{$invoice->id}}</td>
                                    </tr>
                                    <tr>
                                        <td class="head">Invoice Date: </td>
                                        <td>{{$invoice->created_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="table-responsive">
                            <table class=" table middle-table">
                                <tbody class="from-body">
                                    <tr>
                                        <td colspan="2" class="text-left">
                                            <div class="from">
                                                <h2>BILLING FROM</h2>
                                            </div>
                                        </td>
                                        
                                        <td style="max-width: 175px;"></td>
                                        <td colspan="2" class="text-left">
                                            <div>
                                                <h2>BILLING TO</h2>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Branch Name: </td>
                                        <td  class="text-left">{{ $invoice->branch['name'] }}</td>
                                        <td style="min-width: 175px;"></td>
                                        <td class="text-left">Customer Id: </td>
                                        <td class="text-left">{{ $invoice->customer['id'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Branch Email: </td>
                                        <td  class="text-left">{{ $invoice->branch['email'] }}</td>
                                        <td style="min-width: 175px;"></td>
                                        
                                        <td class="text-left">Customer Name: </td>
                                        <td class="text-left">{{ $invoice->customer['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Employee Name: </td>
                                        <td class="text-left">{{ $invoice->User['name'] }}</td>
                                        <td style="min-width: 175px;"></td>
                                        <td class="text-left">Customer Phone: </td>
                                        <td class="text-left">{{ $invoice->customer['mobile'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="invoice-details">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th>Number of return product</th>
                                    <th>invoice id</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice->invoiceReturn_invoiceProduct()->get() as $invoice1)
                                <tr>
                                    <td>{{ $invoice1->num_pr}}</td>
                                    @foreach($invoice1->invoiceProduct()->get() as $invoice2) 
                                    <td>{{ $invoice2->invoice['id'] }} </td>
                                    <td>{{ $invoice2->product_name }}</td>
                                    <td>{{ $invoice2->product_price }}</td>
                                    @endforeach
                                </tr>
                                 @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" rowspan="1"></td>
                                    <td><b>Total Amount</b></td>
                                    <td>{{ $invoice->total_due}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" rowspan="1"></td>
                                    <td><b>Total num</b></td>
                                    <td>{{ $invoice->total_num}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="line"></div>

                    <div class="footer" >
                        <p class="comment">COMMENTS</p>
                        <p class="thank">thank you</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Body -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

     <script src="{{asset('js/main.js')}}"></script>
     <script src="{{asset('js/themes.js')}}"></script>

</body>

</html>