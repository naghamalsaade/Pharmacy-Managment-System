<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">



                          @guest
                      @else


                        <!-- Medicine -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Medicine
                         </a>
                            <div class="dropdown-menu">
                               <a class="dropdown-item" href="/medicine/create">Add</a>
                                <a class="dropdown-item" href="/medicine/all">All</a>
                                <a class="dropdown-item" href="/medicine/index">Search</a>
                                <a class="dropdown-item" href="/medicine/index">Delete</a>
                                <a class="dropdown-item" href="/medicine/index">Edite</a>
                            </div>
                        </li>


                        <!-- Medical Food -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Medical Food
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/medicalFood/create">Add</a>
                                <a class="dropdown-item" href="/medicalFood/all">All</a>
                                <a class="dropdown-item" href="/medicalFood/index">Search</a>
                                <a class="dropdown-item" href="/medicalFood/index">Delete</a>
                                <a class="dropdown-item" href="/medicalFood/index">Eite</a>
                            </div>
                        </li>


                        <!-- Medical Supply -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Medical Supply
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/medicalSupply/create">Add</a>
                                <a class="dropdown-item" href="/medicalSupply/all">All</a>
                                <a class="dropdown-item" href="/medicalSupply/index">Search</a>
                                <a class="dropdown-item" href="/medicalSupply/index">Delete</a>
                                <a class="dropdown-item" href="/medicalSupply/index">Eite</a>
                            </div>
                        </li>


                        <!-- Cosmetic Product -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Cosmetic Product
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/cosmeticProduct/create">Add</a>
                                <a class="dropdown-item" href="/cosmeticProduct/all">All</a>
                                <a class="dropdown-item" href="/cosmeticProduct/index">Search</a>
                                <a class="dropdown-item" href="/cosmeticProduct/index">Delete</a>
                                <a class="dropdown-item" href="/cosmeticProduct/index">Eite</a>
                            </div>
                        </li>

                        <!-- Add -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Add
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/type/create">Type</a>
                                <a class="dropdown-item" href="/ageGroup/create">Age Group</a>
                                <a class="dropdown-item" href="/category/create">Category</a>
                                <!-- <a class="dropdown-item" href="/classification/create">Classification</a> -->
                            </div>
                        </li>

                        <!-- All -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                All
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/type/all">Type</a>
                                <a class="dropdown-item" href="/ageGroup/all">Age Group</a>
                                <a class="dropdown-item" href="/category/all">Category</a>
                               <!--  <a class="dropdown-item" href="/classification/all">Classification</a> -->
                            </div>
                        </li>

                        <!-- Edit -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Edit
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/type/index">Type</a>
                                <a class="dropdown-item" href="/ageGroup/index">Age Group</a>
                                <a class="dropdown-item" href="/category/index">Category</a>
                               <!--  <a class="dropdown-item" href="/classification/index">Classification</a> -->
                            </div>
                        </li>


                    </ul>

                     <!-- Notification -->
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Notification
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="display/notification">notes</a></li>
                       <!--  <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li> -->
                      </ul>
                    </div>

                     @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <a  class="btn btn-dark" href="/write-mail">Send Email</a>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            <!-- Reports -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    Reports
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/type/index">Almost out of stock</a>
                                    <a class="dropdown-item" href="/ageGroup/index">Out Of Stock</a>
                                    <a class="dropdown-item" href="/category/index">Available products and quantities</a>
                                    <a class="dropdown-item" href="/category/index">Expired products and their fate</a>
                                    <!--  <a class="dropdown-item" href="/classification/index">Classification</a> -->
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    

</body>
</html>
