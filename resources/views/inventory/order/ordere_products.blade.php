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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/display_ordered_products.css')}}">

    <title>Pharmacy</title>

    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">
</head>

<body>


  @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="display-ordered-products">
            <div class="card">
                <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        Display Ordered Products
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/order/all"><button type="button" class="btn btn-list"><i class="fa fa-align-justify"></i> &nbsp; Order List</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead>

                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Order Id</th>
                                <th scope="col">Date</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($buyProducts as $one )
                            <tr>

                                <th scope="row">{{ $one->id }}</th>
                                <td>{{ $one->buy_order_id }}</td>
                                <td>{{ $one -> order -> order_date }}</td>
                                <td>
                                    {{\App\Models\Medicine::where('product_id',$one->product_id)->value('generic_name')}}
                                    {{\App\Models\MedicalSupply::where('product_id',$one->product_id)->value('name')}}
                                    {{\App\Models\MedicalFood::where('product_id',$one->product_id)->value('name')}}
                                    {{\App\Models\CosmeticProduct::where('product_id',$one->product_id)->value('name')}}
                                </td>
                                <td>{{ $one->quantity_order }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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


    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>



     <script src="{{asset('js/main.js')}}"></script>
     <script src="{{asset('js/themes.js')}}"></script>

</body>

</html>
