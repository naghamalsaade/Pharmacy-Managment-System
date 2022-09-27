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
    <link rel="stylesheet" href="{{asset('css/user_list.css')}}">

    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/responsive.bootstrap4.min.css')}}">
    
    <title>{{ $title }}</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

   @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="user-list">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                      {{ $title }}
                    </div>
                </div>

                <div class="card-body">
                    <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Working Hours</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Permission & Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $one)
                            <tr>
                                <th scope="row">{{$one->id}}</th>
                                <td>{{$one->name}}</td>
                                <td>{{$one->email}}</td>
                                <td>{{$one->mobile}}</td>
                                <td>{{$one->salary}}</td>
                                <td>{{$one->working_hours}}</td>
                                @if ($one->branch_id == NULL)
                                <td>Not Defined</td>
                                @else
                                <td>{{$one->branch['name']}}</td>
                                @endif
                                <td>
                                Role:{{$one->name_role}}<br>
                                Permission:<br>
                                @foreach($one->allPermissions() as  $value) 
                                    {{$value->name}}<br>
                                 @endforeach
                                </td>
                                <td>{{$one->active}}</td>
                                <td>
                                    <div class="row">

                                    @if($title == "All Employee")
                                        <a href="/user/edit/{{$one->id}}"><i class="fas fa-edit" title="edit"></i></a>
                                        <a href="/user/delete/{{$one->id}}"><i class="fa fa-trash" aria-hidden="true" title="delete"></i></a>
                                        <a href="/user/user-activities-list/{{$one->id}}"><i class="fa fa-address-book-o" aria-hidden="true" title="activity"></i></a>
                                     @endif

                                     @if($title == "Pharmacy Employee List")
                                        <a href="/user/invoices-list/{{$one->id}}"><i class="fas fa-hand-holding-medical" title="invoice"></i></a>
                                        <a href="/user/return-invoices-list/{{$one->id}}"><i class="fas fa-retweet" title="return invoice"></i></a>
                                     @endif

                                     @if($title == "Inventory Employee List")
                                        <a href="/user/orders-list/{{$one->id}}"><i class="fas fa-hand-holding-medical" title="order"></i></a>
                                        <a href="/user/buy-bills-list/{{$one->id}}"><i class="fa fa-money" title="buy bill"></i></a>
                                     @endif

                                     @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                     <a href="/user/invoices-list/{{$one->id}}"><i class="fas fa-hand-holding-medical" title="invoice"></i></a>
                                     <a href="/user/return-invoices-list/{{$one->id}}"><i class="fas fa-retweet" title="return invoice"></i></a>
                                     @endif

                                     @if(auth()->guard('web')->user()->hasRole('Inventory Employee'))
                                     <a href="/user/orders-list/{{$one->id}}"><i class="fas fa-hand-holding-medical" title="order"></i></a>
                                     <a href="/user/buy-bills-list/{{$one->id}}"><i class="fa fa-money" title="buy bill"></i></a>
                                     @endif

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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

     <script src="{{asset('js/main.js')}}"></script>
     <script src="{{asset('js/themes.js')}}"></script>
</body>

</html>