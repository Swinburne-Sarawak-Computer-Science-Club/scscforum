<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/atom-one-dark.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

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

                            <li class="nav-item">
                                <a href="{{ route('users.notifications') }}" class="nav-link">
                                    <span class="badge badge-info" style="color:#fff;">
                                        Unread <i  class="fa fa-bell fa-sm"></i> 
                                        {{ auth()->user()->unreadNotifications->count() }}                     
                                        </span>  
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fa fa-power-off"></i> &nbsp; {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <br>

        <br> 

        @if($errors->count() > 0)

            <ul class="list-group-item">
            
                @foreach($errors->all() as $error)

                    <li class="list-group-item text-danger">
                    
                        {{ $error }}
                    
                    </li>

                @endforeach
            
            </ul>
        
        
            <br>

            <br> 

        @endif

        

            <main class="py-4">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-md-4 col-md-offset-2">

                        <a href="{{ route('discussion.create') }}" class="form-control btn btn-primary"><i class="fa fa-edit fa-lg"></i> Create a new discussion</a>
                        <br>
                        <br>

                     
                                                
                    <div class="card">
                
                            <ul class="list-group">
                                <li class="list-group-item">
                                     <a href="/forum" style="text-decoration: none;">Home</a>
                                </li>

                                <li class="list-group-item">
                                     <a href="/forum?filter=all-my-discussion" style="text-decoration: none;">My Discusssion</a>
                                </li>

                                <li class="list-group-item">
                                     <a href="/forum?filter=solved" style="text-decoration: none;">Solved Discusssion</a>
                                </li>

                                <li class="list-group-item">
                                     <a href="/forum?filter=unsolved" style="text-decoration: none;">Unsolved Discusssion</a>
                                </li>


                            </ul>
                        </div>
                    

                <br>

                    <div class="card">
                
                        
                        @if(Auth::check())

                            @if(Auth::user()->admin)

                                <div class="card-body">
                                    <ul class="list-group">

                                        <li class="list-group-item">
                                            <a href="/channels" style="text-decoration: none;">All Channels</a>
                                        </li>

                                    

                                    </ul>
                                </div>

                            @endif

                        @endif
                        
                        </div>
                   
            
                        <br>

                            <div class="card">
                                <div class="card-header">

                                    Channels
                                    
                                </div>

                                    <ul class="list-group">
                                        @foreach($channels as $channel)
                                        
                                          @continue($channel->id == 0)


                                            <li class="list-group-item">
                                                <a href="{{ route('channel', ['slug' => $channel->slug ]) }}" style="text-decoration: none;">{{ $channel->title }}</a>  
                                            </li>

                                            @if ($channel->id == 2)
                                                @break
                                            @endif

                                        @endforeach

                                        <ul class="list-group-item">
                                        <a class="text-black" data-toggle="collapse" href="#units">Units <i style="font-size: 10px" class="fa fa-plus fa-4x pull-right"></i></a>
              
                                            @foreach($channels as $channel)

                                            @continue($channel->id == 1)

                                            @continue($channel->id == 2)

                                          <div id="units" class="collapse">
                                                <li class="list-group-item">
                                                    <a href="{{ route('channel', ['slug' => $channel->slug ]) }}" style="text-decoration: none;">{{ $channel->title }}</a>  
                                                </li>
                                            </div>


                                         @endforeach
 


                                        </ul>
                                    </ul>

                                    
                            
                            </div>
                            
                        </div>

                        <div class="col-md-8">
                            @yield('content')
                        </div>

                    </div>
                </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    
        @if(Session::has('success'))

            toastr.success('{{ Session::get('success') }} ')
        
        @endif
    
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
@yield('scripts')
</body>
</html>
