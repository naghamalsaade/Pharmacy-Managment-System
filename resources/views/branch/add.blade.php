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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/add_branch.css')}}">

    <title>Add Branch</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">
</head>

<body>

    @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="add-branch">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        Add Branch
                        <a href="/branch/all"><button type="button" class="btn btn-list">
                            <i class="fa fa-align-justify"></i>&nbsp; Branch List</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{route('branch.store')}}" method="POST">
                                @csrf
                                <div class="form-row" style="margin-top: 30px;">
                                    <label for="name" class="col-lg-2 label-input">Name:</label>
                                    <input type="text" class="form-control2 col-lg-9" id="name" placeholder="Name" name="name" required>
                                </div>

                                <div class="form-row">
                                    <label for="email" class="col-lg-2 label-input">E-mail:</label>
                                    <input type="email" class="form-control2 col-lg-9" id="email" placeholder="E-mail" name="email" required>
                                </div>

                                <div class="form-row">
                                    <label class="col-lg-2 col-md-3  label-input">Location:</label>
                                    <select class="selectpicker col-lg-9" data-live-search="true" name="Location">
                                        <option value="null">Nothing selected</option>
                                        @foreach($locations as $one)
                                            <option value="{{$one->id}}">{{$one->country.", ". $one->city. ", ". $one->street}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-row">
                                    <div class="col-lg-9">
                                        <label for="Status " class="col-lg-3 label-input">Type:</label>
                                        <label class="col-lg-4 container">Pharmacy
                                            <input type="radio" checked="checked" name="type" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="col-lg-4 container">Inventory
                                            <input type="radio" name="type" value="0">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-lg-9">
                                        <label for="Status " class="col-lg-3 label-input">Status:</label>
                                        <label class="col-lg-4 container">Active
                                            <input type="radio" checked="checked" name="active" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="col-lg-4 container">Inactive
                                            <input type="radio" name="active" value="0">
                                            <span class="checkmark"></span>
                                    </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-list float-right">Add</button>
                            </form>
                        </div>
                        <div class="col-lg-6 d-none d-xl-block d-lg-block">
                            <img src="{{asset('img/add_branch.jpg')}}" class="img-thumbnail">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

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

    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/themes.js')}}"></script>

</body>

</html>