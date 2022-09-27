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

    <link rel="stylesheet" href="{{asset('css/show_batch.css')}}">


    <title>{{__('messages.pharmacy')}}</title>
    <link rel="icon" href="{{asset('css/master.css')}}img/logo.png" sizes="16x16 32x32" type="image/png">

</head>

<body>

@include('sidebar&navbar')

    <!-- Start Body -->

    <div class="body-page" id="body-page">
        <div class="show-batch">
            <div class="card">
                <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        {{__('messages.display_cosmetic_product_batches')}}
                    </div>
{{--                    <div class="p-2 bd-highlight">--}}
{{--                        <a href="/cosmetic_product/cosmetic_grid"><button type="button" class="btn btn-list"><i class="	fa fa-th"></i> &nbsp;Grid View</button></a>--}}
{{--                        <a href="/cosmetic_product/all"><button type="button" class="btn btn-list"><i class="	fa fa-list-ul"></i> Cosmetics List</button></a>--}}
{{--                    </div>--}}
                </div>
                <div class="card-body">
                    <table id="table" class="table table-striped table-bordered dt-responsive nowrap"
                        style="width:100%;">
                        <thead>

                            <tr>
                                <th scope="col">{{__('messages.id')}}</th>
                                <th scope="col">{{__('messages.name')}}</th>
                                <th scope="col">{{__('messages.amount')}}</th>
                                <th scope="col">{{__('messages.warehouse')}}</th>
                                <th scope="col">{{__('messages.purchasing_price')}}</th>
                                <th scope="col">{{__('messages.selling_price')}}</th>
                                <th scope="col">{{__('messages.production_date')}}</th>
                                <th scope="col">{{__('messages.expired_date')}}</th>
                                <th scope="col">{{__('messages.closet')}}</th>
                                <th scope="col">{{__('messages.rack')}}</th>
                                <th scope="col">{{__('messages.stair')}}</th>
                                <th scope="col">{{__('messages.')}}</th>
                                <th scope="col">{{__('messages.action')}}</th>


                            </tr>
                        </thead>
                        <tbody>

                        @foreach($batches as $batch)
                            <tr>
                                <th>{{$batch -> id}}</th>
                                <td>{{$batch -> name}}</td>
                                <td>{{$batch -> amount}}</td>
                                <td>{{$batch -> name_warehouse}}</td>
                                <td>{{$batch -> purchasing_price}}</td>
                                <td>{{$batch -> selling_price}}</td>
                                <td>{{$batch -> production_date}}</td>
                                <td>{{$batch -> expired_date}}</td>
                                <td>{{$batch -> productPlace ->closet}}</td>
                                <td>{{$batch -> productPlace -> rack}}</td>
                                <td>{{$batch -> productPlace -> drawer}}</td>
                                <td>{{$batch -> date}}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{asset('cosmetic-product/show-details/'. $batch ->id)}}" title="Display"><i class="fas fa-expand-arrows-alt"></i></a>
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
