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
    <!-- <script src="js/popper.min.js"></script> -->





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">



    <link rel="stylesheet" href="{{asset('css/master.css')}}">

    <link rel="stylesheet" href="{{asset('css/show_details_setamol.css')}}">

    <title>Pharmacy</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

@include('sidebar&navbar')

    <!-- Start Body -->


    <div class="body-page" id="body-page">
        <div class="show-details-setamol">
            <div class="card">
                <div class="card-header  d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                       Detail's Medical Supply
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="/medical-supply/supply-grid-in-pharmacy"><button type="button" class="btn btn-list"><i class="	fa fa-th"></i> &nbsp;Grid View</button></a>
                        <a href="/medical-supply/create"><button type="button" class="btn btn-list"><i class="fa fa-plus-square-o"></i> &nbsp;Add Medical Supply</button></a>
                    </div>
                </div>

                @foreach($details as $detail)
                <div class="card-body">
                    <div class="row">
                        <div class="" style="margin-left: 60px; margin-top: 20px; ">
                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Medical Supply Name:
                                    <label class="value">{{$detail -> name}}</label>
                                </label>
                                <br>
                            </div>

                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Use To:
                                    <label class="value">{{$detail -> use_to}}</label>
                                </label>
                                <br>
                            </div>

                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Manufacturer:
                                    <label class="value">{{$detail -> manufacturer_company}}</label>
                                </label>
                                <br>
                            </div>
                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Ware House:
                                    <label class="value">{{$detail -> name_warehouse}}</label>
                                </label>
                                <br>
                            </div>
                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Purchasing Price:
                                    <label class="value">{{$detail -> purchasing_price}}</label>
                                </label>
                                <br>
                            </div>
                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Selling Price:
                                    <label class="value">{{$detail -> selling_price}}</label>
                                </label>
                                <br>
                            </div>
                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Production Date:
                                    <label class="value">{{$detail -> production_date}}</label>
                                </label>
                                <br>
                            </div>
                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Expiry Date:
                                    <label class="value">{{$detail -> expired_date}}</label>
                                </label>
                                <br>
                            </div>
                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Product Country:
                                    <label class="value">{{$detail -> product_country}}</label>
                                </label>
                                <br>
                            </div>

                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Closet:
                                    <label class="value">{{$detail -> productPlace ->closet}}</label>
                                </label>
                                <br>
                            </div>
                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Rack:
                                    <label class="value">{{$detail -> productPlace -> rack}}</label>
                                </label>
                                <br>
                            </div>
                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Drawer:
                                    <label class="value">{{$detail -> productPlace -> drawer}}</label>
                                </label>
                                <br>
                            </div>

                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Amount:
                                    <label class="value">{{$detail -> amount}}</label>
                                </label>
                                <br>
                            </div>

                            <div class="row-details">
                                <i class="fa fa-chevron-circle-right"></i>
                                <label> &nbsp;Batch Date:
                                    <label class="value">{{$detail -> date}}</label>
                                </label>
                                <br>
                            </div>

                        </div>
                        <div class="col-lg-1">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('images/products/'.$detail -> image)}}"  class="rounded float-right">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
