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
    <body class="bg-primary">
        <div class="d-flex  bg-primary" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-primary position-fixed " id="sidebar-wrapper" >   
                <div class="list-group list-group-flush ">
                <div class="sidebar-heading border-bottom text-white align-items-center">Strategy Wizard</div>
                @if($strategy)                
                    <a class="list-group-item list-group-item-action list-group-item-primary p-3"  href="{{ url('/wizard/'. $strategy -> strategy_id . '/define')}}">1.Define Main Objective</a>
                    <a class="list-group-item list-group-item-action list-group-item-primary  p-3" href="{{ url('/wizard/'. $strategy -> strategy_id . '/segmenting')}}">2.Segmentations</a>
                    <a class="list-group-item list-group-item-action list-group-item-primary  p-3" href="{{ url('/wizard/'. $strategy -> strategy_id . '/define')}}">2.1.Strategy Concept Selection</a>
                    <a class="list-group-item list-group-item-action list-group-item-primary  p-3" href="{{ url('/wizard/'. $strategy -> strategy_id . '/define')}}">2.2.Strategy Concept Implementation</a>
                    <a class="list-group-item list-group-item-action list-group-item-primary  p-3" href="{{ url('/wizard/'. $strategy -> strategy_id . '/define')}}">3.Finish</a>
                @else
                    <a class="list-group-item list-group-item-action list-group-item-primary  p-3"  href="">1.Define Main Objective</a>
                    <a class="list-group-item list-group-item-action list-group-item-primary  p-3" href="">2.Segmentations</a>
                    <a class="list-group-item list-group-item-action list-group-item-primary  p-3" href="">2.1.Strategy Concept Selection</a>
                    <a class="list-group-item list-group-item-action list-group-item-primary  p-3" href="">2.2.Strategy Concept Implementation</a>
                    <a class="list-group-item list-group-item-action list-group-item-primary  p-3" href="">3.Finish</a>
                 @endif
                </div>
            </div>
            <!-- Page content wrapper-->
            <div class="bg-primary " id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-white bg-white border-bottom fixed-top ">
                    <div class="container-fluid ">  
                        <button class="btn btn-primary bg-primary" id="sidebarToggle">Show/Hide sidebar</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">                                       
                                        My Strategy
                                    </a>          
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}                                    </a>   

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
                <div class="container-fluid bg-primary text-white">
                <section class="py-5 text-left container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Customer Segment Concept Selection</h1> 
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p2 class="lead text-light"><u><i><b>Strategy Objective</b></i></u> :  {{$strategy->objective}}.</p>
        <p2 class="lead text-light"><u><i><b>Segment Name</b></i></u> : {{$strategy->segment_name}}.</p>
        <p2 class="lead text-light"><u><i><b>Proposition Value</b></i></u> : {{$strategy->propositionvalue}}.
        <p2 class="lead text-light"><u><i><b>Barrier</b></i></u> : {{$strategy->resistor}}.</p>
           
          <h2 class="fw-light">Select Concept For Your Segments</h2>
            <form  method="POST" action="">
            @csrf 
              <div class="form-group">
                          <label for="exampleFormControlTextarea1">Purpose</label>
                          @if($strategy->purpose)                               
                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="purpose" rows="1" placeholder="Purpose" >{{$strategy->purpose}}  </textarea>
                            @else
                            <textarea required class="form-control" id="exampleFormControlTextarea1" name="purpose" rows="1" placeholder="Purpose" ></textarea>
                            @endif                       
                                </div>
                                <h1></h1>
                                <h1></h1>
                                <label for="strategyconcept">Choose Strategy Concept (max 2) </label>
                                <div class="d-flex justify-content-around" id="strategyconcept">       
                                                @if(in_array("Access",$a))  
                                                <input class="form-check-input" name="strategyconcept1" type="checkbox" id="inlineCheckbox1" value="Access" checked>
                                                @else
                                                <input class="form-check-input" name="strategyconcept1" type="checkbox" id="inlineCheckbox1" value="Access" > 
                                                @endif                           
                                                <label class="form-check-label" for="inlineCheckbox1">Access</label>
                                                @if(in_array("Engage",$a))  
                                                <input class="form-check-input" name="strategyconcept2" type="checkbox" id="inlineCheckbox2" value="Engage" checked>
                                                @else
                                                <input class="form-check-input" name="strategyconcept2" type="checkbox" id="inlineCheckbox2" value="Engage">
                                                @endif  
                                                <label class="form-check-label" for="inlineCheckbox2">Engage</label>
                                                @if(in_array("Customize",$a))  
                                                <input class="form-check-input" name="strategyconcept3" type="checkbox" id="inlineCheckbox3" value="Customize" checked>
                                                @else
                                                <input class="form-check-input" name="strategyconcept3" type="checkbox" id="inlineCheckbox3" value="Customize" >
                                                @endif  
                                                <label class="form-check-label" for="inlineCheckbox3">Customize</label> 
                                                @if(in_array("Connect",$a))    
                                                <input class="form-check-input" name="strategyconcept4" type="checkbox" id="inlineCheckbox2" value="Connect" checked>
                                                @else
                                                <input class="form-check-input" name="strategyconcept4" type="checkbox" id="inlineCheckbox2" value="Connect">
                                                @endif                              
                                                <label class="form-check-label" for="inlineCheckbox2">Connect</label>
                                                @if(in_array("Collaborate",$a))   
                                                <input class="form-check-input" name="strategyconcept5" type="checkbox" id="inlineCheckbox2" value="Collaborate" checked>
                                                @else
                                                <input class="form-check-input" name="strategyconcept5" type="checkbox" id="inlineCheckbox2" value="Collaborate">
                                                @endif  
                                                <label class="form-check-label" for="inlineCheckbox2">Collaborate</label>
                                                                             
                                </div>                
                                <h1></h1>
                                <h1></h1>
                                <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Reason</label> 
                                                @if($strategy->reason)                               
                                                    <textarea required class="form-control" id="exampleFormControlTextarea1" name="reason" rows="3" placeholder="Reason" >{{$strategy->reason}}</textarea>
                                                    @else
                                                    <textarea required class="form-control" id="exampleFormControlTextarea1" name="reason" rows="3" placeholder="Reason" ></textarea> 
                                                    @endif                              
                                </div>
                                <h1></h1>
                                <h1></h1>
                                <button type="submit" class="btn btn-secondary my-2">Next</button>         
                            </form>         
                                    
                        </div>
                    </section>

                    
                        </body>

                    <footer class="text-light py-5 ">
                    <div class="container">
                        <p class="float-end mb-1">
                        <a href="#">Back to top</a>
                        </p>
                        <p class="mb-1 text-light"> &copy; Luthfy Aqil Mahendra 2021</p>  
                    </div>
                    </footer>                 
                </div>
            </div>
        </div>
        
        <!-- Core theme JS-->
        <script src="{{asset('layoutclient/js/scripts.js')}}"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('assets2/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('assets2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>   

        <!-- Page level plugins -->
        <script src="{{ asset('assets2/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/lib/moment.js') }}"></script>

        <script src="{{ asset('assets2/vendor/SweetAlert2/sweetalert2.js') }}"></script>
    </body>
</html>

<script>
var limit = 2;
$('input.form-check-input').on('change', function(evt) {
   if($(this).siblings(':checked').length >= limit) {
       this.checked = false;
   }
});
</script>
