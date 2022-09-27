<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- start select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
    <!-- end select -->

    <script src="https://kit.fontawesome.com/18695b64bb.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/popper.min.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/add_cosmetics.css')}}">

    <title>Edit Cosmetic</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

@include('sidebar&navbar')

<!-- Start Body -->
<div class="body-page" id="body-page">
    <div class="add-cosmetics">
        <div class="card">
            <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    Edit Cosmetic Product
                </div>
                <div class="p-2 bd-highlight">
                    <a href="/cosmetic-product/all"><button type="button" class="btn btn-list"><i class="fa fa-align-justify"></i> Cosmetic List</button></a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('cosmeticProduct.update', $cosmeticProduct->id)}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <label for="CosmeticsName" class="col-lg-2 label-input">Name <i class="text-danger"> * </i>:</label>
                        <input type="text" class="form-control col-lg-3" id="CosmeticsName" required name="name" value="{{$cosmeticProduct->name}}">
                        <div class="col-lg-1"></div>
                        <label for="Manufacturer" class="col-lg-2 label-input">Manufacturer</label>
                        <input type="text" class="form-control  col-lg-3" id="Manufacturer" name="manufacturer_company"  value="{{$cosmeticProduct-> product -> manufacturer_company}}">
                    </div>

                    <div class="form-row">
                        <label for="ProductCountry" class="col-lg-2 label-input">Product Country</label>
                        <input type="text" class="form-control col-lg-3" id="ProductCountry" name="product_country" value="{{$cosmeticProduct-> product -> product_country}}">
                        <div class="col-lg-1"></div>
                        <label for="bar_code" class="col-lg-2 label-input">Bar Code</label>
                        <input type="text" class="form-control  col-lg-3" name="bar_code" id="bar_code" value="{{$cosmeticProduct-> product -> bar_code}}">
                    </div>

                    <div class="form-row">
                        <label for="Ingredients" class="col-lg-2 label-input"> Ingredients<i class="text-danger">  </i>:</label>
                        <input type="text" class="form-control col-lg-3" id="Ingredients" required name="ingredients" value="{{$cosmeticProduct->ingredients}}">
                        <div class="col-lg-1"></div>
                        <label for="Description" class="col-lg-2 label-input">Description</label>
                        <input type="text" class="form-control  col-lg-3" id="Description" name="description" value="{{$cosmeticProduct->description}}">
                    </div>

                    <div class="form-row">
                        <div class="col-lg-1"></div>
                        <label class="col-lg-2 label-input">Image</label>
                        <input type="file" class="form-control col-lg-3" id="image" hidden name="image" value="{{$cosmeticProduct-> product -> image}}">
                        <label for="image" class="choose-image label-input">Choose file</label>
                        <span id="file-chosen-cosmetics">No file chosen</span>
                    </div>

                    <button type="submit" class="btn btn-list float-right">Edit</button>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

<script>
    // start choose image
    const image = document.getElementById('image');

    const fileChosen = document.getElementById('file-chosen');

    image.addEventListener('change', function(){
        fileChosen.textContent = this.files[0].name
    })
    // end choose image

</script>

<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/themes.js')}}"></script>

</body>

</html>
