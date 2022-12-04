<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />             
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href= />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('layoutclient/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('segmentbootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
  </head>
    </head>
    <title>Segment Strategy Concept Implementation</title>
    <body class="bg-light">
        <div class="d-flex  bg-light" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-light " id="sidebar-wrapper" > 
            <div class="sidebar-heading border-bottom text-secondary align-items-center">Strategy Wizard</div>  
                <div class="list-group list-group-flush ">                
                @if($strategy)                
                    <a class="list-group-item list-group-item-action list-group-item-light p-3"  href="{{ url('/wizard/'. $strategy -> strategy_id . '/define')}}">1.Define Main Objective</a>
                    <a class="list-group-item list-group-item-action list-group-item-light  p-3" href="{{ url('/wizard/'. $strategy -> strategy_id . '/segmenting')}}">2.Segmentations</a>
                    <a class="list-group-item list-group-item-action list-group-item-light  p-3" href="{{ url('/wizard/'. $strategy -> strategy_id . '/segmenting')}}">2.1.Strategy Concept Selection</a>
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
                                    <a class="dropdown-item" href="/strategylist">                                        
                                        My Strategy
                                    </a>          
                                    <a class="dropdown-item" 
                                       onclick="logout();">
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
                <div class="container-fluid bg-light text-white">
                <section class="py-5 text-left container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-bold text-dark">2.2 Segment Strategy Concept Implementation & Indicator</h1>
        <p class="lead text-dark"><u><i><b>Strategy Objective</b></i></u> :  {{$strategy->objective}}.</p></p>
        <p class="lead text-dark"><u><i><b>Segment Name</b></i></u> : {{$strategy->segment_name}}.</p></p>
        <p class="lead text-dark"><u><i><b>Proposition Value</b></i></u> : {{$strategy->propositionvalue}}.</p></p>
        <p class="lead text-dark"><u><i><b>Barrier</b></i></u> : {{$strategy->resistor}}.</p></p>
        <p class="lead text-dark"><u><i><b>Purpose</b></i></u> : {{$strategy->purpose}}.</p></p>        
        <div class=" required" id="strategyconcept">
        <p class="lead text-dark"><u><i><b>Strategy Concept Selected : </b></i></u></p>    
                                                @if(in_array("Access",$a))  
                                                <img class="img-fluid" src="{{url('/img/strategyconcepticon/access.jpg')}}" > 
                                                @endif                           
                                                
                                                @if(in_array("Engage",$a)) 
                                                <img class="img-fluid" src="{{url('/img/strategyconcepticon/engage.jpg')}}" > 
                                                @endif  
                                                
                                                @if(in_array("Customize",$a))  
                                                <img class="img-fluid" src="{{url('/img/strategyconcepticon/customize.jpg')}}" > 
                                               @endif  
                                                
                                                @if(in_array("Connect",$a))
                                                <img class="img-fluid" src="{{url('/img/strategyconcepticon/connect.jpg')}}" > 
                                               @endif                              
                                                
                                                @if(in_array("Collaborate",$a))
                                                <img class="img-fluid" src="{{url('/img/strategyconcepticon/customize.jpg')}}" > 
                                              @endif  
                                                                           
                                </div>
                                
                    </div>
                        <div class="col-lg-6 col-md-8 mx-auto">        
                        <h1 class="fw-normal text-dark pt-5 fs-3 mb-4">Create New Strategy Concept For Your Segment</h1>
                            <form  method="POST" action="{{url('/wizard/conceptimplementation/'.$strategy->segment_id.'')}}">
                            @csrf 
                            <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="text-dark mb-2">Strategy Concept Name</label>                               
                                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="conceptname" rows="1" placeholder="Concept Strategy Name" ></textarea>                       
                            </div>
                            <h1></h1>
                            <h1></h1>
                            <div class="form-group">
                                        <label for="exampleFormControlTextarea1"class="text-dark my-2">Strategy Description</label>                                
                                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="conceptdescription" rows="10" placeholder="Description" ></textarea>                              
                            </div>
                            <h1></h1>
                            <h1></h1>
                            <div class="form-group">
                                        <label for="exampleFormControlTextarea1"class="text-dark my-2">Indicator</label>                                
                                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="indicator" rows="5" placeholder="Describe Indicator" ></textarea>                              
                            </div>
                            <h1></h1>
                            <h1></h1>
                            <div class="d-grid gap-2"><button type="submit" class="btn btn-primary bg-success mt-3 fw-bold fs-5">Create</button></div>         
                        </form>
                    </div>
                    </div>
                </section>
                <div class="album py-5 bg-light text-white">
                                    <div class="container">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                        @if($strategy_concepts)        
                                        @foreach($strategy_concepts as $s)                                
                                        <div class="col">
                                        <div class="card shadow-sm">
                                            <svg class="bd-placeholder-img card-img-top" width="100%" height="100" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text class="fw-bold" x="50%" y="50%" fill="#eceeef" dy=".3em">Strategy Concept  {{$loop->iteration}}</svg>
                                            <div class="card-body ">
                                            <h5 class="card-title text-muted fw-bold mb-4 fs-4" >{{$s->strategy_concept_name}}</h5>                                            
                                            <p class="card-text text-dark ">Strategy Concept Description = {{$s->strategy_concept_description}}.</p>
                                            <p class="card-text text-dark ">Strategy Concept Indicator = {{$s->strategy_concept_indicator}}.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">                                                
                                                <a class="btn btn-sm btn-outline-danger px-5" href="{{ url('/wizard/conceptimplementation/'. $s -> strategy_concept_id .'/delete')}}"
                                                    onclick="deleteattempt();"> delete</a>
                                                    <script>
                                                    function deleteattempt()
                                                    {
                                                    if(confirm("Are you sure to delete this segment?")==true)
                                                    {                       
                                                        return true;
                                                    }  
                                                    else{
                                                    event.preventDefault();
                                                    return false;
                                                    }
                                                    }
                                                    </script>                  
                                                </div>
                                                <small class="text-muted">{{$s->strategy_concept_name}}</small>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        @endforeach
                                            @if($strategy_concepts->count()==0)
                                            <p class="card-text text-dark ">Theres no Strategy Concept created for this Segment.</p>
                                            @endif
                                        @endif
                                                
                                    </div>
                                </div>

                                    
                        </body>

                    <footer class="text-light py-5 ">
                    <div class="container">
                        <p class="float-end mb-1">
                            @if($strategy_concepts->count()>0)                       
                                <a class="btn btn-sm btn-primary px-5 py-3 fs-5" href="{{ url('/wizard/'. $strategy -> strategy_id .'/segmenting/')}}">Back to segmenting</a>
                            @endif
                        </p>
                        <p class="mb-1 text-dark"> &copy; Luthfy Aqil Mahendra 2021</p>  
                    </div>
                    </footer>                 
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

        <!-- Page level plugins -->
        <script src="{{ asset('assets2/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/lib/moment.js') }}"></script>

        <script src="{{ asset('assets2/vendor/SweetAlert2/sweetalert2.js') }}"></script>
    </body>
</html>
<script>
    function check(){        
        var checked = $('input.form-check-input').siblings(':checked').length > 0;
        if(checked){
           if(confirm("Are You Sure To Submit this")){
            return true;
           }
           else{
            event.preventDefault();
            return false;
           }
        }
        else{
            alert("Please Choose Strategy Concept For Your Strategy");
            event.preventDefault();
            return false;
        }
    }    
    


$('input.form-check-input').on('change', function(evt) {   
       
});
</script>
<script>
    function logout()
    {
        if (confirm("Are You Sure ?")==true){
            document.getElementById('logout-form').submit();
        }
    }
    </script>
