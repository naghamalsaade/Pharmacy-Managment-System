<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- start select -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
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
    <link rel="stylesheet" href="{{asset('css/add_order_to_warehouse.css')}}">

    <title>Add Order</title>

    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

 @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="add-order-to-warehouse">
            <div class="card">
                <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        Add Order To Warehouse
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/warehouse/add"><button type="button" class="btn btn-list"><i class="fa fa-plus-square-o"></i> &nbsp;Add Warehouse</button></a>
                        <a href="/order/all-in-inventory"><button type="button" class="btn btn-list"><i class="fa fa-align-justify"></i> &nbsp;Order List</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form" method="POST" action="{{route('order.store')}}">
                      @csrf
                        <div class="form-row">
                            <label for="warehouse_name" class="col-lg-2 label-input">Warehouse Name<i class="text-danger"> * </i>:</label>
                            <select class="selectpicker col-lg-3 warehouse_name" name="warehouse_id" data-live-search="true" required>
                                <option value=""></option>
                             @foreach ($warehouses as $one)
                             <option value="{{$one->id}}">{{$one->name}}</option>
                              @endforeach
                            </select>
                            <div class="col-lg-1"></div>
                            <label for="order_id" class="col-lg-2 label-input">User Name:</label>
                            <input type="text" name="user_id" value="{{$user->name}}" class="form-control2  col-lg-3 readonly" id="user_id" readonly>

                        </div>

                        <div class="form-row">
                            <label for="Date" class="col-lg-2 label-input">Order Date<i class="text-danger"> * </i>:</label>
                            <input class="form-control2 col-lg-3" id="Date" name="order_date" data-provide="datepicker" required data-date-format="yyyy-mm-dd">
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-invoice text-nowrap custom-table" id="invoice_details">
                                <thead>
                                    <tr class="table-background">
                                        <th class="text-center" scope="col">Product Name<i class="text-danger"> * </i></th>
                                        <th class="text-center" scope="col">Quantity<i class="text-danger"> * </i></th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cloning-row" id="0">
                                        <td>
                                            <select class="selectpicker product_name" data-live-search="true" name="product_id[{{0}}]" required="required">
                                                <option aria-placeholder="Nothing Selected"></option>
                                                @foreach ($allproducts as $one)
                                                <option value="{{$one->product_id}}">{{$one->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td><input type="number" required="required" name="quantity[{{0}}]" id="quantity" class="quantity" style="width: 100%;"></td>

                                        <td class="text-center">
                                            <a class="btn-delete"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" rowspan="1"></td>
                                        <td class="text-center"> <a class="btn-add"><i class="fa fa-plus" aria-hidden="true"></i></a> </td>
                                    </tr>
                                </tfoot>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script src="{{asset('js/bootbox.min.js')}}"></script>

    <script>
    $(document).ready(function () {
            $('#invoice_details').on('blur', '.quantity', function () {
                let $row = $(this).closest('tr');
                let quantity = $row.find('.quantity').val() || 0;

                if (quantity < 0) {
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
                                $row.find('.quantity').val(0);
                            }
                        }
                    });
                }
            });
        });

        $(document).ready(function () {

            $(document).on('click', '.btn-add', function () {
                let tr_count = $('#invoice_details').find('tr.cloning-row:last').length;
                let numberIncr = tr_count > 0 ? parseInt($('#invoice_details').find('tr.cloning-row:last').attr('id')) + 1 : 0;

                $('#invoice_details').find('tbody').append($('' +
                    '<tr class="cloning-row" id="' + numberIncr + '">' +

                    '<td><select class="selectpicker product_name" data-live-search="true" style="width: 120%;"name="product_id[' + numberIncr + ']" required="required"><option value=""></option>@foreach($allproducts as $one)<option value="{{$one->name}}">{{$one->name}}</option>@endforeach</select></td>'+

                            '<td><input type="number" required name="quantity[' + numberIncr + ']" class="quantity" style="width: 100%;"></td>' +

                                    '<td class="text-center">  <a class="btn-delete"><i class="fa fa-minus" aria-hidden="true"></i></a> </td>' +
                                    '</tr>'
                                ));
                    $('.selectpicker').selectpicker('render')
            });

            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
            });

        });
     </script>

     <script src="{{asset('js/main.js')}}"></script>
     <script src="{{asset('js/themes.js')}}"></script>

</body>

</html>
