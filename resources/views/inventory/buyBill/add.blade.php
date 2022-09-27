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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/popper.min.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/received_from_warehouse.css')}}">

    <title>Pharmacy</title>

    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

   @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="received-from-warehouse">
            <div class="card">
                <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        Received From Warehouse
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/order/all-in-inventory"><button type="button" class="btn btn-list"><i class="fa fa-align-justify"></i> &nbsp; Order List</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form  action="{{route('buyBill.store')}}" method="POST">
                      @csrf
                        <div class="form-row">
                            <label for="from_warehouse" class="col-lg-2 label-input">From Warehouse:</label>
                            <input type="text" name="from_warehouse" value="{{ $buyOrder -> wareHouse -> name }}" class="form-control2  col-lg-3 readonly" id="from_warehouse" readonly>
                            <div class="col-lg-1"></div>
                            <label for="to_inventory" class="col-lg-2 label-input">To Inventory:</label>
                            <input type="text" name="user_id" value="{{ $buyOrder -> user -> branch_id }}" class="form-control2  col-lg-3 readonly" id="to_inventory" readonly>
                        </div>

                        <div class="form-row">
                            <label for="total_price" class="col-lg-2 label-input">Total Price:</label>
                            <input type="text" class="form-control2 readonly col-lg-3" readonly="readonly" name="total_price" id="total_price">
                            <div class="col-lg-1"></div>
                            <label for="total_payment_amount" class="col-lg-2 label-input">Total Payment Amount<i class="text-danger"> </i>:</label>
                            <input type="text" class="form-control2  col-lg-3" name="total_payment" id="total_payment_amount" required>
                        </div>

                        <div class="form-row">
                            <label for="order_id" class="col-lg-2 label-input">Order Id:</label>
                            <input type="text" name="order_id" value="{{ $buyOrder->id }}"class="form-control2  col-lg-3 readonly" id="order_id" readonly>
                            <div class="col-lg-1"></div>
                            <label for="Date" class="col-lg-2 label-input">Received Date<i class="text-danger"> * </i>:</label>
                            <input class="form-control2 col-lg-3" id="Date" name="recieve_date" data-provide="datepicker" required data-date-format="yyyy-mm-dd">
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-invoice text-nowrap custom-table"
                                id="invoice_details">
                                <thead>
                                    <tr class="table-background">
                                        <th class="text-center" scope="col">Product Name</th>
                                        <th class="text-center" scope="col">Production Date</th>
                                        <th class="text-center" scope="col">Expiry Date</th>
                                        <th class="text-center" scope="col">Purchasing Price</th>
                                        <th class="text-center" scope="col">Selling Price</th>
                                        <th class="text-center" scope="col">Ordered Quantity</th>
                                        <th class="text-center" scope="col">Received Quantity</th>
                                        <th class="text-center" scope="col">Received<i class="text-danger"> * </i></th>
                                        <th class="text-center" scope="col" style="width: 100px;">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($buyOrder->buyProducts()->get() as $item)

                                <tr class="cloning-row">
                                        <input type="hidden" name="id[]" id="id" value="{{ $item->id }}">

                                    <td>
                                        {{ \App\Models\Medicine::where('product_id',$item->product_id)->value('generic_name') }}
                                        {{ \App\Models\MedicalSupply::where('product_id',$item->product_id)->value('name') }}
                                        {{ \App\Models\MedicalFood::where('product_id',$item->product_id)->value('name') }}
                                        {{ \App\Models\CosmeticProduct::where('product_id',$item->product_id)->value('name') }}
                                    </td>

                                    <td> <input class="form-control2 production_date" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="production_date[]" style="width: 100%;"> </td>

                                    <td> <input class="form-control2 expiry_date" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="expaire_date[]" style="width: 100%;"> </td>

                                    <td> <input type="number" class="purchasing_price" style="width: 100%;" name="individual_price[]" > </td>

                                    <td> <input type="number" class="selling_price" style="width: 100%;" name="payment_price[]"> </td>

                                    <td> <input type="number" class="order_quantity readonly" style="width: 100%;" name="Quantity[]" readonly="readonly" value="{{$item->quantity_order}}"> </td>

                                    <td> <input type="number" class="received_quantity readonly" style="width: 100%;" name="alrady_recieved[]" readonly="readonly" value="{{App\Models\BuyBillProduct::where('buy_product_id',$item->id)->get()->sum('quantity_recived')}}"> </td>

                                    <td> <input type="number" name="recieve_quantity[]" class="receive" style="width: 100%;"> </td>

                                    <td> <input type="number" class="total readonly" style="width: 103%;" name="total[]" readonly="readonly"> </td>
                                </tr>
                                 @endforeach
                                </tbody>

                            </table>
                        </div>
                        <button type="submit" class="btn btn-list float-right add">Add</button>
                    </form>
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

    <script src="{{asset('js/bootbox.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#invoice_details').on('blur', '.receive', function () {
                let $row = $(this).closest('tr');
                let receive = $row.find('.receive').val() || 0;
                let received_quantity = $row.find('.received_quantity').val() || 0;
                let order_quantity = $row.find('.order_quantity').val() || 0;

                var total2 = Number(receive) + Number(received_quantity);
                let max = order_quantity - received_quantity;
                if (Number(total2) > order_quantity) {
                    bootbox.confirm({
                        message: "You can receive maximum " + max + " items",
                        buttons: {
                            confirm: {
                                label: 'OK',
                                className: 'btn-success'
                            },
                        },
                        callback: function (result) {
                            if (result) {
                                $row.find('.receive').val(0);
                            }
                        }
                    });
                }
                if (receive < 0) {
                    bootbox.confirm({
                        message: "You can't choose a quantity less than zero",
                        buttons: {
                            confirm: {
                                label: 'OK',
                                className: 'btn-success'
                            },
                        },
                        callback: function (result) {
                            if (result) {
                                $row.find('.receive').val(0);
                            }
                        }
                    });
                }

                let purchasing_price = $row.find('.purchasing_price').val() || 0;

                $row.find('.total').val((purchasing_price * receive));
                $('#total_price').val(total_price('.total'));
            });

            /////////////////
            $('#invoice_details').on('blur', '.purchasing_price', function () {
                let $row = $(this).closest('tr');
                let purchasing_price = $row.find('.purchasing_price').val() || 0;
                let selling_price = $row.find('.selling_price').val() || 0;
                let receive = $row.find('.receive').val() || 0;

                $row.find('.total').val((purchasing_price * receive));
                $('#total_price').val(total_price('.total'));


                if (purchasing_price < 0) {
                    bootbox.confirm({
                        message: "You can't choose a purchasing price less than zero",
                        buttons: {
                            confirm: {
                                label: 'OK',
                                className: 'btn-success'
                            },
                        },
                        callback: function (result) {
                            if (result) {
                                $row.find('.purchasing_price').val(0);
                            }
                        }
                    });
                }
                if (Number(purchasing_price) >Number(selling_price)  && selling_price>0) {
                    bootbox.confirm({
                        message: "You can't choose a purchasing price more than selling price",
                        buttons: {
                            confirm: {
                                label: 'OK',
                                className: 'btn-success'
                            },
                        },
                        callback: function (result) {
                            if (result) {
                                $row.find('.purchasing_price').val(0);
                            }
                        }
                    });
                }
            });

            //////////////////////
            $('#invoice_details').on('blur', '.selling_price', function () {
                let $row = $(this).closest('tr');
                let selling_price = $row.find('.selling_price').val() || 0;
                let purchasing_price = $row.find('.purchasing_price').val() || 0;
                let receive = $row.find('.receive').val() || 0;

                $row.find('.total').val((purchasing_price * receive));
                $('#total_price').val(total_price('.total'));


                if (selling_price < 0) {
                    bootbox.confirm({
                        message: "You can't choose a selling price less than zero",
                        buttons: {
                            confirm: {
                                label: 'OK',
                                className: 'btn-success'
                            },
                        },
                        callback: function (result) {
                            if (result) {
                                $row.find('.selling_price').val(0);
                            }
                        }
                    });
                }

                if (Number(selling_price) < Number(purchasing_price) && selling_price>0) {
                    bootbox.confirm({
                        message: "You can't choose a selling price less than purchasing price",
                        buttons: {
                            confirm: {
                                label: 'OK',
                                className: 'btn-success'
                            },
                        },
                        callback: function (result) {
                            if (result) {
                                $row.find('.selling_price').val(0);
                            }
                        }
                    });
                }

            });

            ///////////////
            let total_price = function ($selector) {
                let sum = 0;
                let item = 0;
                $($selector).each(function () {

                    let selectorVal = $(this).val() != '' ? $(this).val() : 0;
                    sum += Number(selectorVal);
                    item++;
                });
                $('#num_item').val(item);
                return sum;
            }


            $('#total_payment_amount').on('blur', function () {

                var  total_price2  = $('#total_price').val()
                console.log(total_price2);
                var total_payment_amount = $(this).val();
                console.log(total_payment_amount);
                if (Number(total_payment_amount) > Number(total_price2))
                {
                    bootbox.confirm({
                        message: "You can't payment amount more than " + total_price2 ,
                        buttons: {
                            confirm: {
                                label: 'OK',
                                className: 'btn-success'
                            },
                        },
                        callback: function (result) {
                            if (result) {
                                $('#total_payment_amount').val(0);
                            }
                        }
                    });
                }

                if (total_payment_amount < 0) {
                bootbox.confirm({
                    message: "You can't payment amount less than zero",
                    buttons: {
                        confirm: {
                            label: 'OK',
                            className: 'btn-success'
                        },
                    },
                    callback: function (result) {
                        if (result) {
                            $('#total_payment_amount').val(0);
                        }
                    }
                });
            }

            });
        });
    </script>

     <script src="{{asset('js/main.js')}}"></script>
     <script src="{{asset('js/themes.js')}}"></script>

</body>

</html>
