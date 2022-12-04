<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />             
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href= />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('layoutclient/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body class="bg-light">
        <div class="d-flex  bg-light " id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-light " id="sidebar-wrapper" > 
            <div class="sidebar-heading border-bottom text-secondary align-items-center">Strategy Wizard</div>  
                <div class="list-group list-group-flush  ">
                    @if($strategy)                
                        <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="{{ url('/wizard/'. $strategy -> strategy_id . '/define')}}">1.Define Main Objective</a>
                        <a class="list-group-item list-group-item-action list-group-item-light  p-3" href="{{ url('/wizard/'. $strategy -> strategy_id . '/segmenting')}}">2.Segmentations</a>
                        <a class="list-group-item list-group-item-action list-group-item-light  p-3" href="{{ url('/wizard/'. $strategy -> strategy_id . '/define')}}">2.1.Strategy Concept Selection</a>
                        <a class="list-group-item list-group-item-action list-group-item-light  p-3" href="{{ url('/wizard/'. $strategy -> strategy_id . '/define')}}">2.2.Strategy Concept Implementation</a>
                        <a class="list-group-item list-group-item-action list-group-item-light  p-3" href="{{ url('/wizard/'. $strategy -> strategy_id . '/define')}}">3.Finish</a>
                    @else
                        <a class="list-group-item list-group-item-action list-group-item-light  p-3"  href="">1.Define Main Objective</a>
                        <a class="list-group-item list-group-item-action list-group-item-light  p-3" href="">2.Segmentations</a>
                        <a class="list-group-item list-group-item-action list-group-item-light  p-3" href="">2.1.Strategy Concept Selection</a>
                        <a class="list-group-item list-group-item-action list-group-item-light  p-3" href="">2.2.Strategy Concept Implementation</a>
                        <a class="list-group-item list-group-item-action list-group-item-light  p-3" href="">3.Finish</a>
                    @endif
                    </div>
                </div>
            <!-- Page content wrapper-->
            <div class="bg-light " id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-white bg-white border-bottom fixed-top ">
                    <div class="container-fluid ">  
                        <button class="btn btn-light bg-primary text-light" id="sidebarToggle">Show/Hide sidebar</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="/LandingClient">Home</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/LandingClient">                                       
                                        My Strategy
                                    </a>          
                                    <a class="dropdown-item"  
                                       onclick="logout();">
                                        {{ __('Logout') }}                                    
                                    </a>   
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid bg-light text-white">
                    <div class="row">
                        <div class="col-xs-6 mx-auto">
                            
                            
                @yield('content')
                        </div>   
                    </div>                 
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('assets2/vendor/jquery/jquery.min.js') }}"></script>        
        <!-- Bootstrap core JS-->
        <script src="{{asset('segmentbootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('layoutclient/js/scripts.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('assets2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>   
        
    </body>
</html>

<script>
    function logout()
    {
        if (confirm("Are You Sure ?")==true){
            document.getElementById('logout-form').submit();
        }
        
    }
</script>
