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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

    <title>Add Employee</title>

    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<div class="body-page" id="body-page">
    <div class="login">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 d-none d-xl-block d-lg-block">
                        <img src="{{asset('img/register.jpg')}}" class="img-thumbnail" style="margin-top: 90px">
                    </div>
                    <div class="col-lg-6">
                        <form method="POST"action="{{route('user.store')}}">
                            @csrf
                            <div class="header">
                                Add New,<br>
                                Employee 
                            </div>
                            <div class="col">
                                <input id="name" type="text" class="form-control input  @error('name') is-invalid @enderror" name="     name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <span class="focus-input" data-placeholder="Name"></span>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <input id="email" type="email"
                                    class="form-control input  @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="focus-input" data-placeholder="Email"></span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <input id="password" type="password"
                                    class="form-control input @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                <span class="focus-input" data-placeholder="Password"></span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <input id="password-confirm" type="password"
                                    class="form-control input" name="password_confirmation"
                                    required autocomplete="new-password">
                                <span class="focus-input" data-placeholder="Confrim Password"></span>
                            </div>
                             <div class="col">
                                <input id="mobile" type="text"
                                    class="form-control input @error('mobile') is-invalid @enderror" name="mobile"
                                    value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                                <span class="focus-input" data-placeholder="Mobile"></span>
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>                          
                            <div class="form-group row mb-0">
                                <div class="login">
                                    <button type="submit" class="btn btn-info">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <script src="{{asset('js/themes.js')}}"></script>

</body>

</html>