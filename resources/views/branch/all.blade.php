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

    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/branch_list.css')}}">

    <title>{{ $title }}</title>
   <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">
</head>

<body>

    @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="branch-list">
            <div class="card">
                <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        {{ $title }}
                    </div>
                    
                    @if ($title == "All Branch")
                    <div class="p-2 bd-highlight">
                        <a href="/branch/add"><button type="button" class="btn btn-list"><i class="fa fa-plus-square-o">
                            </i> &nbsp;Add Branch</button></a>
                    </div> 
                    @endif
                    
                </div>
                <div class="card-body">
                    <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Type</th>
                                <th scope="col">Location</th>
                                <th scope="col">Status</th>
                                @if (auth()->guard('web')->user()->hasRole('Admin'))
                                <th scope="col">Action</th>  
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branches as $one)
                            <tr>
                                <th scope="row">{{$one->id}}</th>
                                <td>{{$one->name}}</td>
                                <td>{{$one->email}}</td>
                                <td>{{$one->type}}</td>
                                <td>{{$one->location['country'] .', '. $one->location['city'].', '. $one->location['street']}}</td>
                                <td>{{$one->active}}</td>

                                @if (auth()->guard('web')->user()->hasRole('Admin'))
                                <td>
                                    <div class="row">

                                        @if($title == "All Branch")
                                        <a href="/branch/edit/{{$one->id}}"><i class="fas fa-edit" title="edite"></i></a>
                                        <a href="/branch/delete/{{$one->id}}"><i class="fa fa-trash" aria-hidden="true" title="delete"></i></a>
                                        <a href="/branch/employees-list/{{$one->id}}"><i class="fa fa-user" aria-hidden="true" title="employee"></i></a>
                                        @endif

                                        @if($title == "Pharmacy List") 
                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <a class="btn-add" title="product"><i class="fa fa-cart-arrow-down"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="list-group">
                                                    <a href="/pharmacy/medicins-list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-product">
                                                    Medicine</a>
                                                    <a href="/pharmacy/supplies-list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-product">
                                                    Medical Supply</a>
                                                    <a href="/pharmacy/foods-list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-product">
                                                    Medical Food</a>
                                                    <a href="/pharmacy/cosmetic-list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-product">
                                                    Cosmetic Product</a>
                                                   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="btn-group dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <a class="btn-add" title="customer"><i class="fa fa-users"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <div class="list-group">
                                                    <a href="/pharmacy/customers-list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-customer">
                                                    All Customer</a>
                                                    <a href="/pharmacy/customers-have-reckonings-list/{{ $one->id }}" class="list-group-item list-group-item-action list-group-item-customer">
                                                    Customers Who Have Debts</a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <a href="/pharmacy/return-invoices/list/{{$one->id}}"><i class="fa fa-retweet" aria-hidden="true" title="return invoices"></i></a>
                                        <a href="/pharmacy/invoices/list/{{$one->id}}"><i class="fas fa-hand-holding-medical" aria-hidden="true" title="invoices"></i></a>
                                        <a href="/pharmacy/reckonings-list/{{$one->id}}"><i class="fa fa-hourglass-half" aria-hidden="true" title="debt invoices"></i></a>
                                        <a href="/pharmacy/payments-list/{{$one->id}}"><i class="fa fa-money" aria-hidden="true" title="payments"></i></a>
                                        @endif

                                        @if($title == "Inventory List")
                                            <a href="/inventory/product-list/{{$one->id}}"><i class="fa fa-dolly-flatbed" aria-hidden="true" title="product"></i></a>
                                            <a href="/inventory/warehouses-list/{{$one->id}}"><i class="fa fa-university" aria-hidden="true" title="warehouse"></i></a>
                                            <a href="/inventory/orders-list/{{$one->id}}"><i class="fa fa-hand-holding-medical" aria-hidden="true" title="order"></i></a>
                                            <a href="/inventory/buy-bills-list/{{$one->id}}"><i class="fa fa-money" aria-hidden="true"  title="buy bill"></i></a> 
                                        @endif

                                    </div>
                                </td>                                    
                                @endif
                                
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

    <script>
        // Scroll To Top Button
        mybutton = document.getElementById("myBtn");
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        function topFunction() {
            document.documentElement.scrollTop = 0;
            document.documentElement.behavior = "smooth";
        }
    </script>

</body>

</html>