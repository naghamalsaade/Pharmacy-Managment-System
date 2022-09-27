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
    <link rel="stylesheet" href="{{asset('css/my_profile.css')}}">
    
    <title>Pharmacy</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

    @include('sidebar&navbar')

    <!-- Start Body -->
    <div class="body-page" id="body-page">
        <div class="my-profile">
            <div class="container">
                <div class="row row-profile">
                    <div class="card ">
                        <img src="{{asset('img/myProfile.jpg')}}" class="card-img-top" style="height: 180px;">
                        <div class="card-body text-center">
                            <a class="avatar avatar-xl card-avatar card-avatar-top">
                                <img src="{{asset('img/user3.jpg')}}" class="avatar-img rounded-circle border-card">
                            </a>
                            <p class="card-text text-muted">{{ auth()->guard('web')->user()->name_role }}</p>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="text-left">Name: </td>
                                        <td class="text-right">{{auth()->guard('web')->user()->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Email: </td>
                                        <td class="text-right">{{auth()->guard('web')->user()->email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Mobile: </td>
                                        <td class="text-right">{{auth()->guard('web')->user()->mobile}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Salary: </td>
                                        <td class="text-right">{{auth()->guard('web')->user()->salary}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Working Hours: </td>
                                        <td class="text-right">{{auth()->guard('web')->user()->working_hours}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Branch: </td>
                                        @if (auth()->guard('web')->user()->branch_id == NULL)
                                        <td class="text-right">Not Define</td>
                                        @else
                                        <td class="text-right">{{auth()->guard('web')->user() -> branch -> name}}</td>
                                        @endif
                                        
                                    </tr>
                                </tbody>
                            </table>
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

     <script src="{{asset('js/main.js')}}"></script>
     <script src="{{asset('js/themes.js')}}"></script>
</body>

</html>