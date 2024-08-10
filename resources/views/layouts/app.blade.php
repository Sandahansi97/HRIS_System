<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<title>{{ config('app.name', 'Laravel 8 User Roles and Permissions Tutorial') }}</title>--> 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            @if (Route::has('login'))
            @auth
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('home') }}">Home<span class="sr-only">(current)</span></a>
                </li>
            @else
                 @if (Route::has('register'))
                 <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a>
                </li>
                @endif
                @endauth
            @endif
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('aboutus') }}">About Us<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('posts') }}">View All Jobs<span class="sr-only">(current)</span></a>
                </li>
                <!-- <li><a class="nav-link" href="{{ route('users.index') }}">View All Jobs<span class="sr-only">(current)</span>
                </a></li> -->   
            @if (Route::has('login'))
            @auth
                @if(Auth::user()->utype === 'ADMIN')
                <!-- admin -->
                <li class="nav-item active"><a class="nav-link" href="{{ route('users.index') }}">Manage Users<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{url('files') }}">Submitted Applications<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{url('video_chat') }}">Interview Call<span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="{{url('posts') }}">Add new Jobs<span class="sr-only">(current)</span></a>
                </li> -->

                <!-- <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li> -->
                            <!--<li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>--> 
                            <!-- <li><a class="nav-link" href="{{ route('products.index') }}">Manage Posts</a></li>  -->
                @else
                <!-- user only -->
                <!-- interw show only selected applicants -->
                @if(Auth::user()->application_stage ==='1')
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('video_chat') }}">Interview<span class="sr-only">(current)</span></a>
                    </li>
                @endif



                @endif 
                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
            @else
                @if (Route::has('register'))
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('login') }}">Sign In<span class="sr-only">(current)</span></a>
                </li>
                @endif
                @endauth
            @endif 

           
            
        </div>
        </nav>
        <!-- {{-- this is a comment --}}<<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel 8 User Roles and Permissions - ItSolutionStuff.com
                </a> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    Left Side Of Navbar
                    <ul class="navbar-nav mr-auto"></ul> -->
                    <!-- Right Side Of Navbar -->
                    <!-- <ul class="navbar-nav ml-auto">
                        Authentication Links --> 
                        <!-- @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                            <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                         @endguest -->
                    <!-- </ul>
                </div>
            </div>
        </nav> -->
        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>