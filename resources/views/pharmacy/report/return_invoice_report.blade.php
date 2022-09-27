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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" src="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/invoice_report.css')}}">

    <title>Pharmacy</title>
    
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>
    

    @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="invoice-report">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                       Invoices Report 
                    </div>
                </div>
                <div class="card-body">
                    <form action="/Invoice/All/report" method="GET">
                        @csrf
                        <div class="row form-search-date">
                            <div class="col-lg-5 col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Start Date</span>
                                    </div>
                                    <input name="start_date" class="form-control search-date" placeholder="Start Date " aria-describedby="basic-addon1" data-provide="datepicker">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">End Date </span>
                                    </div>
                                    <input name="end_date" class="form-control search-date" placeholder="End Date " aria-describedby="basic-addon1" data-provide="datepicker">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn float-lg-left float-md-right find">
                                Find </button>
                            </div>
                        </div>
                    </form>

                    <div class="line"></div>

                    <div class=" row-total">
                        <div class="address ">
                            <label class="detailed">Total report </label>
                            <form>
                                <div class="form-row">
                                    <div class="col-lg-5 col-md-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text total-span" id="basic-addon1">Total number of invoices :</span>
                                            </div>
                                            <input class="form-control read" readonly value="{{count($invoices)}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5 col-md-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text total-span" id="basic-addon1">Total value of invoices :</span>
                                            </div>
                                            <input class="form-control read" readonly value="{{$invoices->sum('total_due')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-5 col-md-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text total-span" id="basic-addon1">
                                                Total value paid of invoices :</span>
                                            </div>
                                            <input class="form-control read" readonly value="{{$invoices->sum('paid')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-5 col-md-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text total-span" id="basic-addon1">Total number of products :</span>
                                            </div>
                                            <input class="form-control read" readonly value="{{$invoices->sum('total_num')}}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="line"></div>
                    <div class=" row-detailed">
                        <div class="address ">
                            <label class="detailed">Detailed report </label>
                        </div>
                    </div>

                    <table id="table1" class="table table-striped table-bordered dt-responsive nowrap" style="width:96.5%">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Customer ID </th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Invoice Date</th>
                                <th scope="col">Employee</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Total Num</th>
                                <th scope="col">Total</th>
                                <th scope="col">Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                            <tr>
                                <th scope="row">{{$invoice->id}}</th>
                                <td>{{ $invoice->customer['id'] }}</td>
                                <td>{{ $invoice->customer['name'] }}</td>
                                <td>{{$invoice->created_at}}</td>
                                <td>{{ $invoice->User['name'] }}</td>
                                <td>{{ $invoice->branch['name'] }}</td>
                                <td>{{ $invoice->total_num}}</td>
                                <td>{{ $invoice->total_due}} PS</td>
                                <td>{{ $invoice->paid}} PS</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="line line-graphic"></div>

                    <div class=" row-graphic">
                        <div class="address ">
                            <label class="detailed">graphic report </label>
                            <div id="chartContainer" class="chartContainer" style="height: 300px; width: 95%; margin-bottom: 30px;"></div>
                        </div>
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

    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#table1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/themes.js')}}"></script>
    <script src="{{asset('js/canvasjs.min.js')}}"></script>

    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: ""
                },
                axisY: {
                    title: "Revenue in USD",
                    valueFormatString: "#0,,.",
                    suffix: "mn",
                    prefix: "$"
                },
                data: [{
                    type: "splineArea",
                    color: "rgba(54,158,173,.7)",
                    markerSize: 5,
                    xValueFormatString: "YYYY",
                    yValueFormatString: "$#,##0.##",
                    dataPoints: [
                     @foreach($invoices as $invoice)

                        { x: {{$invoice->id}}, y: {{$invoice->total_due}} },
                       
                      @endforeach
                    ]
                }]
            });
            chart.render();
        }
    </script>

</body>

</html>