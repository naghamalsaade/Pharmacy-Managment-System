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
    <link rel="stylesheet" href="{{asset('css/medicalFood_list.css')}}">

    <link rel="stylesheet" href="{{asset('css/show_details_nido.css')}}">

    <title>{{__('messages.pharmacy')}}</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

    @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="medicalFood-list">
            <div class="card">
                <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                    {{ $title }}
                    </div>
                    <div class="p-2 bd-highlight">
                        @if($title == "Medical Food List In Pharmacy")
                        <a href="/medical-food/food-grid-in-pharmacy"><button type="button" class="btn btn-list"><i class="	fa fa-th"></i> &nbsp;{{__('messages.grid')}}</button></a>
                        @endif
                        <a href="/medical-food/create"><button type="button" class="btn btn-list"><i class="fa fa-plus-square-o"></i> &nbsp;{{__('messages.add_food')}}</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-striped  table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead>

                        <tr>
                            <th scope="col">{{__('messages.id')}}</th>
                            <th scope="col">{{__('messages.name')}}</th>
                            <th scope="col">{{__('messages.storage')}}</th>
                            <th scope="col">{{__('messages.adverse_effects')}}</th>
                            <th scope="col">{{__('messages.manufacturer')}}</th>
                            <th scope="col">{{__('messages.product_country')}}</th>
                            <th scope="col">{{__('messages.bar_code')}}</th>
                            <th scope="col">{{__('messages.image')}}</th>
                            <th scope="col">{{__('messages.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($medicalFoods as $medicalFood)
                        <tr>
                            <th scope="row">{{$medicalFood -> id}}</th>
                            <td>{{$medicalFood -> name}}</td>
                            <td>{{$medicalFood -> storage}}</td>
                            <td>{{$medicalFood -> adverse_effects}}</td>
                            <td>{{$medicalFood -> manufacturer_company}}</td>
                            <td>{{$medicalFood -> product_country}}</td>
                            <td>{{$medicalFood -> bar_code}}</td>
                            <td><img src="{{asset('images/products/'.$medicalFood -> image)}}" class="medicine-img"></td>
                            <td>
                                <div class="row">

                                    @if ($title == "All Medical Food")
                                    <a href="{{asset('medical-food/edit/'. $medicalFood -> id)}}"><i class="fas fa-edit" title="Edit"></i></a>
                                    <a href="{{asset('medical-food/delete/'. $medicalFood -> id)}}"><i class="fa fa-trash" title="Delete"></i></a>
                                    @endif

                                    @if($title == "Medical Food List In Pharmacy")
                                    <a href="{{asset('medical-food/show-batch/'. $medicalFood -> id)}}" title="All batches in this pharmacy"><i class="fas fa-clone"></i></a>
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

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/themes.js')}}"></script>

</body>

</html>
