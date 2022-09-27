<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- start select -->
    <link rel="stylesheet"
          href="{{asset('css/bootstrap-select.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- end select -->

    <script src="https://kit.fontawesome.com/18695b64bb.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/popper.min.js')}}"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/master.css')}}">

    <link rel="stylesheet" href="{{asset('css/add_medicine.css')}}">

    <title>Edit Medicine</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

@include('sidebar&navbar')


<!-- Start Body -->
<div class="body-page" id="body-page">
    <div class="add-medicine">
        <div class="card">
            <div class="card-header d-flex justify-content-between bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    Edit Medicine
                </div>
                <div class="p-2 bd-highlight">
                    <a href="/medicine/all"><button type="button" class="btn btn-list"><i
                        class="fa fa-align-justify"></i> &nbsp;Medicine List</button></a>
                </div>
            </div>
            <div class="card-body">
                <form  method="POST" action="{{route('medicine.update', $medicine -> id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row" style="margin-top: 30px;">
                        <label for="MedicineName" class="col-lg-2 label-input">Medicine Name <i class="text-danger"> </i>:</label>
                        <input type="text" class="form-control2 col-lg-3" id="MedicineName" value="{{$medicine ->medicine_name}}" name="medicine_name" required>
                        <div class="col-lg-1"></div>
                        <label for="GenericName" class="col-lg-2 label-input">Generic Name <i class="text-danger">  </i>:</label>
                        <input type="text" class="form-control2 col-lg-3" id="GenericName" value="{{$medicine ->generic_name}}" name="generic_name" required>
                    </div>

                    <div class="form-row">
                        <label class="col-lg-2 label-input">Category:</label>
                        <select class="selectpicker col-lg-3" data-live-search="true" name="category">
                            <option value="{{$medicine ->category ->name_category}}">Nothing selected</option>
                            @foreach($categories as $category)
                                <option value="{{$category -> id}}">{{$category -> name_category}}</option>
                            @endforeach
                        </select>
                        <div class="col-lg-1"></div>
                        <label class="col-lg-2 label-input">Type:</label>
                        <select class="selectpicker col-lg-3" data-live-search="true" name="type">
                            <option value="{{$medicine ->type ->name_type}}">Nothing selected</option>
                            @foreach($types as $type)
                                <option value="{{$type -> id}}">{{$type -> name_type}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <label class="col-lg-2 label-input">Age Group:</label>
                        <select class="selectpicker col-lg-3" data-live-search="true" name="agegroup">
                            <option value="{{$medicine ->ageGroup ->name_age_group}}">Nothing selected</option>
                            @foreach($ageGroups as $ageGroup)
                                <option value="{{$ageGroup -> id}}">{{$ageGroup -> name_age_group}}</option>
                            @endforeach
                        </select>
                        <div class="col-lg-1"></div>
                        <label class="col-lg-2 label-input">Effective Material:</label>
                        <select class="selectpicker col-lg-3" data-live-search="true" multiple name="effective_material">
                            <!-- <option value="null">Nothing selected</option> -->
                            @foreach($effectiveMaterials as $effectiveMaterial)
                                <option value="{{$effectiveMaterial -> id}}">{{$effectiveMaterial -> name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="Strength" class="col-lg-2 label-input">Strength:</label>
                        <input type="text" class="form-control2 col-lg-3" id="Strength"  value="{{$medicine ->caliber}}" name="caliber">
                        <div class="col-lg-1"></div>
                        <label for="composition" class="col-lg-2 label-input">Composition:</label>
                        <input type="text" class="form-control2  col-lg-3" id="composition" name="composition" value="{{$medicine ->composition}}">
                    </div>

                    <div class="form-row">
                        <label for="alternatives" class="col-lg-2 label-input">Alternatives:</label>
                        <input type="text" class="form-control2 col-lg-3" id="alternatives" name="alternative_medicine" value="{{$medicine ->alternative_medicine}}">
                        <div class="col-lg-1"></div>
                        <label for="indications" class="col-lg-2 label-input">Indications:</label>
                        <input type="text" class="form-control2  col-lg-3" id="indications" name="indications" value="{{$medicine ->indications}}">
                    </div>

                    <div class="form-row">
                        <label for="ProductCountry" class="col-lg-2 label-input">Product Country:</label>
                        <input type="text" class="form-control2 col-lg-3" id="ProductCountry" name="product_country" value="{{$medicine ->product -> product_country}}">
                        <div class="col-lg-1"></div>
                        <label for="Manufacturer" class="col-lg-2 label-input">Manufacturer:</label>
                        <input type="text" class="form-control2  col-lg-3" id="Manufacturer" name="manufacturer_company" value="{{$medicine ->product ->manufacturer_company}}">
                    </div>

                    <div class="form-row">
                        <label for="bar_code" class="col-lg-2 label-input">Bar Code:</label>
                        <input type="text" class="form-control2  col-lg-3" id="bar_code" value="{{$medicine ->product ->bar_code}}" name="bar_code">
                        <label class="col-lg-3 col-md-2 label-input">Image:</label>
                        <input type="file" class="form-control2" id="image" value="{{$medicine ->product ->image}}" hidden name="image"/>
                        <label for="image" class="choose-image label-input">Choose file</label>
                        <span id="file-chosen">No file chosen</span>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 d-none d-xl-block d-lg-block">
                            <img src="{{asset('img/add-med.jpg')}}" height="200px" class="float-right">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-12">
                            <label for="Status " class="col-lg-2 label-input">Status:</label>
                            <label class="col-lg-2  container">Active
                                <input type="radio" checked="checked" name="radio" value="Active">
                                <span class="checkmark"></span>
                            </label>
                            <label class="col-lg-2 container">Inactive
                                <input type="radio" name="radio" value="Inactive">
                                <span class="checkmark"></span>
                            </label>
                        </div>
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

    image.addEventListener('change', function () {
        fileChosen.textContent = this.files[0].name
    })
    // end choose image
</script>

<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/themes.js')}}"></script>

</body>

</html>
