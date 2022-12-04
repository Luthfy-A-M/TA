<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome.min.css">
    
    <!--Icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    
    <!-- Bootstrap core JS-->
    <script src="{{asset('segmentbootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core theme JS-->
    <script src="{{asset('layoutclient/js/scripts.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="/css/untitled.css">  
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">CustomerNetworkStrategyGenerator</a>
               <ul class="navbar-nav">
      
    <li class="nav-item">
      <a class="nav-link js-scroll-trigger" href="{{url('facilitator/showstrategylist')}}">List Strategy</a>
    </li>   
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
  </ul>
 
       
    <div id="notification"> 
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
       $(document).ready(function(){
        $('#notification').load("/getnotification");
         setInterval(function()
         {
            $('#notification').load("/getnotification");
         }
            ,10000);
  });
</script>     
  
      
  <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li>
                            
                          </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                    <a class="dropdown-item" href="/facilitator/showstrategylist">                                       
                                        My Strategy
                                    </a>
                                    
                                    
                                    
                                    <a class="dropdown-item"
                                       onclick="logout();">
                                        {{ __('Logout') }}                                    </a>   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    <script>
                                    function logout()
                                    {
                                        if (confirm("Are You Sure ?")==true){
                                            document.getElementById('logout-form').submit();
                                        }
                                        else{
                                            event.preventDefault();
                                        }
                                        
                                    }
                                </script>
                                        @csrf
                                    </form>
                                </nav>
                                 </ul>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

</body>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>


@yield('scripts')
