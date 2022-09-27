{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
{{--        <link href="{{ asset('css/form.css') }}" rel="stylesheet">--}}
{{--        <link rel="stylesheet" href="../../../public/css/form.css" >--}}

{{--        <script src="../../../public/js/form.js"></script>--}}
{{--    </head>--}}
{{--    <body >--}}
{{--        <div class="container">--}}
{{--            <div id="form-main">--}}
{{--                <div id="form-div">--}}



{{--                    <form class="montform" id="reused_form" action="{{route('mail.send')}}" enctype=&quot;multipart/form-data&quot; >--}}
{{--                        <p class="name">--}}
{{--                            <input name="name" type="text" class="feedback-input" required placeholder="Name" id="name" />--}}
{{--                        </p>--}}
{{--                        <p class="email">--}}
{{--                            <input name="email" type="email" required class="feedback-input" id="email" placeholder="Email" />--}}
{{--                        </p>--}}
{{--                        <p class="text">--}}
{{--                            <textarea name="message" class="feedback-input" id="comment" placeholder="Message"></textarea>--}}
{{--                        </p>--}}
{{--                        <p class="file">--}}
{{--                            <input name="image" type="file" id="file" class="feedback-input">--}}
{{--                        </p>--}}
{{--                        <div class="submit">--}}
{{--                            <button type="submit" class="button-blue">SUBMIT</button>--}}
{{--                            <div class="ease"></div>--}}
{{--                        </div>--}}
{{--                    </form>--}}



{{--                    <div id="error_message" style="width:100%; height:100%; display:none; ">--}}
{{--                        <h4>--}}
{{--                            Error--}}
{{--                        </h4>--}}
{{--                        Sorry there was an error sending your form.--}}
{{--                    </div>--}}
{{--                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h2>Success! Your Message was Sent Successfully.</h2> </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </body>--}}
{{--</html>--}}
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




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">





    <link rel="stylesheet" href="{{asset('css/master.css')}}">

    <link rel="stylesheet" href="{{asset('css/send_email.css')}}">

    <title>Pharmacy</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" sizes="16x16 32x32" type="image/png">

</head>

<body>

@include('sidebar&navbar')


<!-- Start Body -->


<div class="body-page" id="body-page">
    <div class="send-email">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    Send E-mail
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 form-email">




                        <form method="GET" action="{{ url('mail/send-mail') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control toggle1" id="name" placeholder="Full Name" required/>
                                    <label class="label-input-icon" for="name">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control toggle2" name="email" id="email"
                                           placeholder="E-mail" required />
                                    <label class="label-input-icon" for="name">
                                        <i class="fa fa-envelope"></i>
                                    </label>

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control toggle4" name="subject" id="subject" placeholder="Subject"/>
                                <label class="label-input-icon3" for="name">
                                    <i class="fas fa-book"></i>
                                </label>

                            </div>
                            <div class="form-group">
                                <textarea class="form-control toggle3" name="message" rows="5" placeholder="Message" required></textarea>
                                <label class="label-input-icon2" for="name">
                                    <i class="fa fa-comment"></i>
                                </label>
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control col-lg-3" id="image" placeholder="Image" hidden name="file" />
                                <label for="image" class="choose-image label-input">Choose file</label>
                                <span id="file-chosen" >No file chosen</span>
                            </div>

                            <button type="submit" class="btn btn-list"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp; Send</button>


                        </form>
                    </div>
                    <div>
                        <div class="col-lg-6 d-none d-xl-block d-lg-block float-right">
                            <img class="image " src="{{asset('img/email.jpg')}}">
                        </div>

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

<script>

    // start choose image
    const image = document.getElementById('image');

    const fileChosen = document.getElementById('file-chosen');

    image.addEventListener('change', function () {
        fileChosen.textContent = this.files[0].name
    })
    // end choose image






    $('.toggle1').focus(function () {
        $('.fa-user').addClass('focus1');
    });

    $('.toggle1').blur(function () {
        $('.fa-user').removeClass('focus1');
    });

    $('.toggle2').focus(function () {
        $('.fa-envelope').addClass('focus2');
    });

    $('.toggle2').blur(function () {
        $('.fa-envelope').removeClass('focus2');
    });


    $('.toggle3').focus(function () {
        $('.fa-comment').addClass('focus3');
    });


    $('.toggle3').blur(function () {
        $('.fa-comment').removeClass('focus3');
    });


    $('.toggle4').focus(function () {
        $('.fa-book').addClass('focus4');
    });


    $('.toggle4').blur(function () {
        $('.fa-book').removeClass('focus4');
    });



    (function () {

        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

</script>



</body>

</html>
