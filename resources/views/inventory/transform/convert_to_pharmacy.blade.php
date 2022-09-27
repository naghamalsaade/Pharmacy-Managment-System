<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- start select -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <!-- end select -->

    <script src="https://kit.fontawesome.com/18695b64bb.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/popper.min.js')}}"></script>


    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>


    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/convert_to_pharmacy.css')}}">
    <title>Pharmacy</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

@include('sidebar&navbar')


<!-- Start Body -->

<div class="body-page" id="body-page">
    <div class="convert-to-pharmacy">
        <div class="card">
            <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    Convert To Pharmacy
                </div>
                <div class="p-2 bd-highlight">
                    <a href="{{asset('/inventory/product-list/'.auth()->user()->branch_id)}}"><button type="button" class="btn btn-list"> <i
                     class="fa fa-align-justify"></i> &nbsp;Display Inventory Product</button></a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('transform.store')}}">
                    @csrf
                    <div class="form-row" style="margin-top: 30px;">
                        <label for="branch" class="col-lg-2 label-input">Branch<i class="text-danger">
                                * </i>:</label>
                        <select class="selectpicker col-lg-3 branch" name="branch_id" data-live-search="true" required>
                            <option value=""></option>
                            @foreach($pharmacies as $pharmacy)

                                <option value="{{$pharmacy -> id}}">{{$pharmacy -> name}}</option>
                            @endforeach

                        </select>

                        <label for="quantity" class="col-lg-2 label-input">Quantity<i class="text-danger">*
                            </i>:</label>
                        <input type="int" class="form-control2 col-lg-3 quantity" id="quantity" name="quantity" required>
                    </div>

                    <div class="form-row">
                        <label for="closet" class="col-lg-2 label-input">Closet:</label>
                        <input type="text" class="form-control2 col-lg-3" id="closet" name="closet">



                        <label for="rack" class="col-lg-2 label-input">Rack:</label>
                        <input type="text" class="form-control2 col-lg-3" id="rack" name="rack">
                    </div>

                    <div class="form-row">
                        <label for="drawer" class="col-lg-2 label-input">Drawer:</label>
                        <input type="text" class="form-control2 col-lg-3" id="drawer" name="drawer">
                    </div>

                    <input type="hidden" value="{{$id}}" name="buy_bill_product_id">

                    <div>
                        <button type="submit" class="btn btn-list float-right" >Convert</button>

                    </div>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/i18n/defaults-*.min.js"></script> -->


<script src="{{asset('js/themes.js')}}"></script>



<script src="{{asset('js/bootbox.min.js')}}"></script>

<script>

    var qty = document.getElementsByClassName('quantity');

    var available_quantity = {{ $amount }};

    $(document).ready(function(){
        $('#quantity').on('blur',function () {
            if ($('#quantity').val() > available_quantity) {
                bootbox.confirm({
                    message: "You can't choose a quantity more than " + available_quantity,
                    buttons: {
                        confirm: {
                            label: 'OK',
                            className: 'btn-success'
                        },
                    },
                    callback: function (result) {
                        if (result) {
                            $('#quantity').val(0);
                        }
                    }
                });
            }
        });
    });



</script>
<script src="{{asset('js/main.js')}}"></script>
</body>

</html>
