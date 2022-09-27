<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- start select -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- end select -->

    <script src="https://kit.fontawesome.com/18695b64bb.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/popper.min.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/add_return_invoice.css')}}">

    <title>Pharmacy</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

   @include('sidebar&navbar')
    
   <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="add-return-invoice">
            <div class="card">
                <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        Add Return Invoice
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/return-invoice/all-in-pharmacy/list"><button type="button" class="btn btn-list"><i class="fa fa-align-justify"></i> &nbsp;Return Invoice List</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <label for="CustomerName" class="col-lg-2 label-input">Customer Name:</label>
                            <input type="text" class="form-control2  col-lg-3 readonly" id="CustomerName" placeholder="Ahmad" readonly>
                            <div class="col-lg-1"></div>
                            <label for="InvoiceDate" class="col-lg-2 label-input">Date<i class="text-danger"> * </i>:</label>
                            <input class="form-control2 col-lg-3" id="InvoiceDate" data-provide="datepicker" required data-date-format="yyyy-mm-dd">
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered table-invoice  ">
                            <thead>
                                <tr class="table-background">
                                    <th class="text-center" scope="col">Invoice ID</th>
                                    <th class="text-center" scope="col">Product Name</th>
                                    <th class="text-center" scope="col">Product Price</th>
                                    <th class="text-center" scope="col">Ret Qty</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cart)
                                @foreach( $cart->items as $PrCa)
                                <tr>
                                    <td class="text-center"><input type="number" placeholder="{{ $PrCa['I_P']->invoice['id'] }}" class="readonly" readonly style="width: 100%;"></td>
                                    <td class="text-center"><input type="tect" placeholder="{{ $PrCa['I_P']->product_name}}" class="readonly" readonly style="width: 100%;"></td>
                                    <td class="text-center"><input type="number" placeholder="{{ $PrCa['I_P']->product_price}}"   class="readonly" readonly style="width: 100%;"></td>
                                    <td class="text-center"><input type="number" placeholder="{{ $PrCa['qty'] }}" class="readonly" readonly style="width: 100%;"></td>
                                    <td class="text-center">
                                        <a href="{{ route('product.remove', $PrCa['I_P'])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                 @endforeach                          
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" rowspan="1"></td>
                                    <td class="text-center" colspan="1" style="padding-top:18px"><b>Net Return:</b></td>
                                    <td class="text-center"><input type="number" placeholder="{{$cart->totalPrice}}" class="readonly" readonly style="width: 100%;"></td>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>
                    <a type="button" class="btn btn-list float-right add"  href="/return-invoice/return">Return</a> 
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

     <script src="{{asset('js/main.js')}}"></script>
     <script src="{{asset('js/themes.js')}}"></script>
</body>

</html>