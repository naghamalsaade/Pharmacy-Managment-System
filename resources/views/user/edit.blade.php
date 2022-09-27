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
    <link rel="stylesheet" href="{{asset('css/edit_user.css')}}">

    <title>Edit Employee</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

    <!-- Start Sidebar -->
   @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="edit-user">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        Edit {{$user->name}} information 
                        <a href="/user/all"><button type="button" class="btn btn-list">
                            <i class="fa fa-align-justify"></i>&nbsp;All employee </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{ route('user.update', $user->id)}}" method="POST">
                                @csrf
                                <div class="form-row" style="margin-top: 30px;">
                                    <label for="salary" class="col-lg-3 label-input">Salary:</label>
                                    <input type="text" class="form-control2 col-lg-7" id="salary" placeholder="Salary" name="salary" onkeypress="return onlyNumberKey(event)" value="{{ $user->salary }}">
                                </div>

                                <div class="form-row">
                                    <label for="working_hours" class="col-lg-3 label-input">Working Hours:</label>
                                    <input type="text" class="form-control2 col-lg-7" id="working_hours" placeholder="Working Hours" name="working_hours" onkeypress="return onlyNumberKey(event)" value="{{ $user->working_hours }}">
                                </div>

                                <div class="form-row">
                                    <label class="col-lg-3 col-md-3 label-input">Role:</label>
                                    <select class="selectpicker col-lg-7" data-live-search="true" name="role">
                                        <option value=""></option>
                                        @foreach($roles as $one)
                                        <option value="{{$one->name}}">{{$one->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <div class="form-row">
                                    <label class="col-lg-3 col-md-3 label-input">Permission:</label>
                                    <select class="selectpicker col-lg-7"  multiple data-live-search="true" name="permissions[]">
                                        <option value=""></option>
                                         @foreach($permissions as $one)
                                            <option value="{{$one->name}}">{{$one->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-row">
                                    <label for="branch" class="col-lg-3 col-md-3 label-input">Branch: </label>
                                    <select class="selectpicker col-lg-7 branch" name="branch" data-live-search="true" >
                                        <option ></option>
                                        @foreach($branches as $one)
                                            <option value="{{$one->id}}" >{{$one->name}}</option>
                                        @endforeach
                                    </select>          
                                </div>

                                <div class="form-row">
                                    <div class="col-lg-10">
                                        <label for="Status " class="col-lg-4  label-input">Status:</label>
                                        <label class="col-lg-3 container">Active
                                            <input type="radio" checked="checked" name="radio" value="1">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="col-lg-4 container">Inactive
                                            <input type="radio" name="radio" value="0">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-11">
                                    <button type="submit" class="btn btn-list float-right">Edit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 d-none d-xl-block d-lg-block">
                            <img src="{{asset('img/hours2.jpg')}}" class="img-thumbnail">
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
        // Accept Only Number
        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/themes.js')}}"></script>

</body>

</html>