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
    <link rel="stylesheet" href="{{asset('css/customer_list.css')}}">

    <title>Customer List</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">
</head>

<body>
    @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="customer-list">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        {{ $title }}

                        @if ($title == "Customer Come To Pharamcy")
                        <a href="/customer/add"><button type="button" class="btn btn-list"><i class="fa fa-plus-square-o"></i>&nbsp Add Customer </button></a>
                        @endif

                    </div>
                </div>
                <div class="card-body">

                    <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="customar_table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Reckon</th>
                                <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index=0;  ?>
                            @foreach($customers as $one)
                            <tr>
                                <th scope="row">{{$one->id}}</th>
                                <td>{{$one->name}}</td>
                                <td>{{$one->mobile}}</td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text reckoning" id="btnGroupAddon" id="reckoning" name="reckoning" style="width: 150px;"> {{$one->reckoning}}</div>
                                        </div>
                                        <button type="button" class="btn btn-list" data-toggle="modal" data-target="#paidModal" aria-describedby="btnGroupAddon">Paid</button>
                                    </div>
                                    <div class="modal fade" id="paidModal" tabindex="-1" role="dialog"  aria-labelledby="paidModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="paidModalLabel">Pay off debt</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('customer.paid_reckon',$one->id) }}" method="POST">
                                                        @csrf
                                                        <div class="form-row">
                                                            <input type="decimal" class="form-control paid" name="paid" id="paid" style="width: 200px; margin-left: 40px;">
                                                        </div>
                                                        <div class="form-row">
                                                            <label style="margin-top: 13px; margin-left: 40px;">Remaining amount: </label>
                                                            <label class="paid_label" id="paid_label" name="paid_label[1]"></label>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="submit" value="Paid" class="btn btn-list" style="font-size: 15px;">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </td>
                                <td>{{$one->active}}</td>
                                <td>
                                    <div class="row">
                                        
                                        @if (auth()->guard('web')->user()->hasRole('Pharmacy Employe'))
                                        <a href="/customer/edit/{{$one->id}}" title="edit"><i class="fas fa-edit"></i></a>
                                        <a href="/customer/delete/{{$one->id}}" title="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        @endif
                                        
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <a class="btn-add" title="purchases"><i class="fas fa-cart-arrow-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="list-group">
                                                    <a href="/customer/product-list/{{ $one->id }}/{{ auth()->user()->branch_id }}" class="list-group-item list-group-item-action list-group-item-product"><i class="fas fa-code-branch"></i>Current Pharmacy</a> 
                                                    <a href="/customer/product-list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-product"><i class="fas fa-code-branch"></i>All Pharmacy</a>
                                                    @foreach($pharmacies as $one1)
                                                    <a href="/customer/product-list/{{ $one->id }}/{{ $one1->id }}" class="list-group-item list-group-item-action list-group-item-product"><i class="fas fa-code-branch"></i> {{$one1->name}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <a class="btn-add"  title="invoices"><i class="fas fa-hand-holding-medical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="list-group">
                                                <a href="/customer/invoices/list/{{ $one->id }}/{{ auth()->user()->branch_id }}" class="list-group-item list-group-item-action list-group-item-invoice"><i class="fas fa-code-branch"></i>Current Pharmacy</a>
                                                <a href="/customer/invoices/list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-invoice"><i class="fas fa-code-branch"></i>All Pharmacy</a>
                                                @foreach($pharmacies as $one1)
                                                <a href="/customer/invoices/list/{{ $one->id }}/{{ $one1->id }}" class="list-group-item list-group-item-action list-group-item-invoice"><i class="fas fa-code-branch"></i> {{$one1->name}}</a>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <a class="btn-add" title="return invoices"><i class="fa fa-retweet"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="list-group">
                                                    <a href="/customer/return-invoice/list/{{ $one->id }}/{{ auth()->user()->branch_id }}" class="list-group-item list-group-item-action list-group-item-return"><i class="fas fa-code-branch"></i>Current Pharmacy</a> 
                                                    <a href="/customer/return-invoice/list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-return"><i class="fas fa-code-branch"></i>All Pharmacy</a>
                                                    @foreach($pharmacies as $one1)
                                                    <a href="/customer/return-invoice/list/{{ $one->id }}/{{ $one1->id }}" class="list-group-item list-group-item-action list-group-item-return"><i class="fas fa-code-branch"></i> {{$one1->name}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <a class="btn-add" title="payment"><i class="fa fa-money"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="list-group">
                                                    <a href="/customer/payments-list/{{ $one->id }}/{{ auth()->user()->branch_id }}" class="list-group-item list-group-item-action list-group-item-repayment"><i class="fas fa-code-branch"></i>Current Pharmacy</a>
                                                    <a href="/customer/payments-list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-repayment"><i class="fas fa-code-branch"></i>All Pharmacy</a>
                                                    @foreach($pharmacies as $one1)
                                                    <a href="/customer/payments-list/{{ $one->id }}/{{ $one1->id }}" class="list-group-item list-group-item-action list-group-item-repayment"><i class="fas fa-code-branch"></i> {{$one1->name}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <a class="btn-add" title="debt invoice"><i class="fa fa-hourglass-half"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="list-group">
                                                <a href="/customer/reckoning-list/{{ $one->id }}/{{ auth()->user()->branch_id }}" class="list-group-item list-group-item-action list-group-item-debt"><i class="fas fa-code-branch"></i>Current Pharmacy</a>
                                                <a href="/customer/reckoning-list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-debt"><i class="fas fa-code-branch"></i>All Pharmacy</a>
                                                @foreach($pharmacies as $one1)
                                                <a href="/customer/reckoning-list/{{ $one->id }}/{{ $one1->id }}" class="list-group-item list-group-item-action list-group-item-debt"><i class="fas fa-code-branch"></i> {{$one1->name}}</a>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </td>
                            </tr>
                            <?php $index++; ?>
                            @endforeach
                            <!--  End For Each -->
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/themes.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#customar_table').on('keyup blur', '.paid', function () {
                let $row = $(this).closest('tr');
                let paid = $row.find('.paid').val() || 0;
                let reckoning = $row.find('.reckoning').val() || 0;
                $row.find('.paid_label').val((reckoning - paid));
            });
        });
    </script>

</body>

</html>