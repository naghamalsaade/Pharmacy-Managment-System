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
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
     
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/all_debt_invoices.css')}}">

    <title>Pharmacy</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

@include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="all-debt-invoices">
            <div class="card">
                <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        {{ $title }}
                    </div>
                    
                    @if ($title == "All Debt Invoices")
                    <div class="p-2 bd-highlight">
                        <a href="/customer/all"><button type="button" class="btn btn-list"><i class="fa fa-align-justify"></i> &nbsp;Customer List</button></a>
                    </div>
                    @endif

                    @if ($title == "All Debt Invoices In Pharmacy")
                    <div class="p-2 bd-highlight">
                        <a href="/customer/all-in-pharmacy"><button type="button" class="btn btn-list"><i class="fa fa-align-justify"></i> &nbsp;Customer List</button></a>
                    </div>
                    @endif
                   
                </div>
                <div class="card-body">

                    @if ($title == "All Debt Invoices" || $title == "All Debt Invoices In Pharmacy")
                    <div class="row form-search-date">
                        <div class="col-lg-5 col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Start Date</span>
                                </div>
                                <input class="form-control search-date" placeholder="Start Date" aria-describedby="basic-addon1" data-provide="datepicker">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">End Date</span>
                                </div>
                                <input class="form-control search-date" placeholder="End Date" aria-describedby="basic-addon1" data-provide="datepicker">
                            </div>
                        </div>
                        <div class="col-lg-2 ">
                            <button type="button" class="btn btn-list float-lg-left float-md-right find">Find</button>
                        </div>
                    </div>
                    <div class="line"></div>
                    @endif

                    <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Cusotmer Id</th>
                                <th scope="col">Cusotmer Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                        @foreach($debts as $one)
                        <th scope="row">{{$one->id}}</th>
                        <td>{{$one->customer_id}}</td>
                        <td>{{$one->name}}</td>
                        <td>{{$one->paid}}</td>
                        <td>{{$one->updated_at}}</td>
                                <td>
                                    <div class="row">
                                        <a href="/invoice/delete-loan/{{$one->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </td>
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