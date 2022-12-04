@extends('layouts.postlogin')


@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strategy {{$strategy->strategy_name}} Details </title>
    <link rel="stylesheet" href="/css/user.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('segmentbootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>


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

<body>

    <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container post">
        <div class="row">
            <div class="col-md-6 post-title">
                <h1>Strategy Details</h1>
                <p class="author"><strong>TA</strong> <span class="text-muted">2021 </span></p>
            </div>
            <div class="col-md-6 post-body">
                <p>Customer Network Strategy Generator</p>
                <p>This is full details of your strategy</p>
                <p></p>
            </div>
        </div>
            <div class="card shadow-sm">
                <div class= "card-body">
                    <h2 class="card-title text-dark"><b> Strategy : {{$strategy->strategy_name}} </b></h2>
                    <p><i> Strategy Objective </i> : {{$strategy->objective}}. </p>
                    <p><i>facilitator </i> : {{$strategy->name}} / {{$strategy->email}}  </p>
                    <div class="btn-group gap-2 my-3">
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-success px-5" data-toggle="modal" data-target="#adddataModal" >
                                    Add Data
                                    </button>
                                    <!-- Modaladddata -->
                                    <div class="modal fade " id="adddataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form  method="POST" action="{{ url('strategy/'.$strategy->strategy_id.'/adddata')}}">
                                            @csrf 
                                            @foreach($segments as $s)
                                            <div class="card shadow-sm"> 
                                                <div class="card-header">Segment :{{$s->segment_name}} </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        @foreach($s->strategy_concept as $b)
                                                        <label for="exampleFormControlTextarea1{{$b->strategy_concept_id}}">Achieved?  {{$b->strategy_concept_indicator}}</label>                               
                                                                <input required type="number" class="form-control" id="exampleFormControlTextarea1{{$b->strategy_concept_id}}" name="data[{{$b->strategy_concept_id}}]" rows="1" placeholder="Achieved/Gain (data)"  >
                                                        @endforeach                       
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                                                                        
                                            
                                            <h1></h1>
                                            <h1></h1>
                                            <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Date : (Month/year)</label>                                
                                                        <div class="well">
                                                        <input type="text" class="form-control" name="date" id="datepicker" required onkeypress="return false;" />
                                                                    <script>
                                                                    $("#datepicker").datepicker( {
                                                                        format: "mm-yyyy",
                                                                        startView: "months", 
                                                                        minViewMode: "months"
                                                                    });
                                                                        </script>
                                                                
                                                            </div>                              
                                            </div>
                                            <h1></h1>
                                            <h1></h1>
 
                                        
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">add data</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                <a class="btn btn-primary px-5" href="{{ url('/strategy/'. $strategy ->strategy_id . '/dashboard')}}" > Strategy Dashboard</a>
                                <a class="btn btn-sm btn-outline-primary px-4" href="{{ url('/wizard/'. $strategy ->strategy_id . '/define')}}">Edit</a> 
                                <a class="btn btn-sm btn-outline-danger px-4" onclick="deleteattempt();" href="{{ url('/wizard/'. $strategy ->strategy_id . '/delete')}}">Delete</a> 
                                        <script>
                                        function deleteattempt(){
                                            if (confirm("Are you sure to delete this strategy?")==true){
                                                if(confirm("This Will Delete Every segment ,strategy concept and data for this strategy")==true)                        
                                                {
                                                    return true;
                                                }
                                                else{
                                                event.preventDefault();
                                                return false;
                                                }
                                            }
                                            else{
                                                event.preventDefault();
                                                return false;
                                            }
                                        } 
                                        </script>   
                    </div>
                    <div class="card shadow-sm"> 
                        <div class="card-header">
                            <h4>Segments for this Strategy : {{$segments->count()}} segments</h4>
                        </div> 
                    </div> 
                     <!--Carousel Wrapper-->
                     <div id="multi-item-example" class="carousel slide carousel-multi-item" >

                        <!--Controls-->
                        <div class="controls-top d-flex justify-content-center my-3">
                        <div class="mx-3"><a class="btn-floating text-decoration-none" href="#multi-item-example" data-slide="prev">
                            <i class="fas fa-chevron-left mx-1"></i>Previous Segment
                        </a></div>
                        <div><a class="btn-floating text-decoration-none" href="#multi-item-example" data-slide="next">Next Segment<i
                            class="fas fa-chevron-right mx-1"></i></a></div>
                        </div>
                        <!--/.Controls-->

                        <!--Indicators-->
                        <ol class="carousel-indicators">
                        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                        <li data-target="#multi-item-example" data-slide-to="1"></li>

                        </ol>
                        <!--/.Indicators-->

                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        @foreach($segments as $s)
                        @if($loop->iteration==1)
                        <div class="carousel-item active" data-interval="999999999" >
                        @else
                        <div class="carousel-item" data-interval="99999999">
                        @endif
                        <ul class="list-group list-group-flush">    
                        <div class="card shadow-sm">
                        <div class="card-header"><h3>Segment {{$loop->iteration}}</h3></div>
                        <div class="card-body ">
                            <h6 class="fs-6 text-secondary" > SEGMENT NAME :</h6> 
                            <h5 class="fw-normal">{{$s->segment_name}}</h5>
                            <h6 class="fs-6 text-secondary mt-5">SEGMENT VALUE : </h6>
                            <h5 class="fw-normal">{{$s->propositionvalue}}.</h5>
                            <h6 class="fs-6 text-secondary mt-5">SEGMENT BARRIER : </h6>
                            <h5 class="fw-normal">{{$s->resistor}}.</h5>
                            <h6 class="fs-6 text-secondary mt-5">PURPOSE : </h6>
                            <h5 class="fw-normal">{{$s->purpose}}.</h5>
                            <h6 class="fs-6 text-secondary mt-5">STRATEGY CONCEPT SELECTED : </h6>
                            <h5 class="fw-normal">@if(in_array("Access",$s->a))  
                                                <img class="img-fluid" width="100" height="100" src="{{url('/img/strategyconcepticon/access.jpg')}}" > 
                                                @endif                           
                                                
                                                @if(in_array("Engage",$s->a)) 
                                                <img class="img-fluid" width="100" height="100" src="{{url('/img/strategyconcepticon/engage.jpg')}}" > 
                                                @endif  
                                                
                                                @if(in_array("Customize",$s->a))  
                                                <img class="img-fluid" width="100" height="100" src="{{url('/img/strategyconcepticon/customize.jpg')}}" > 
                                               @endif  
                                                
                                                @if(in_array("Connect",$s->a))
                                                <img class="img-fluid"  width="100" height="100"src="{{url('/img/strategyconcepticon/connect.jpg')}}" > 
                                               @endif                              
                                                
                                                @if(in_array("Collaborate",$s->a))
                                                <img class="img-fluid" width="100" height="100" src="{{url('/img/strategyconcepticon/customize.jpg')}}" > 
                                              @endif</h4>
                            <h6 class="fs-6 text-secondary mt-5">REASON : </h6>
                            <h5 class="fw-normal">{{$s->reason}}.</h5>
                            
                                                                           
                        
                                <div class="my-4 ">
                                    <a class="btn btn-sm btn-outline-primary px-5 py-2" href="{{ url('/wizard/conceptselecting/'. $s -> segment_id . '')}}">Setup</a>
                                    <a class="btn btn-sm btn-outline-danger px-5 py-2" href="{{ url('/wizard/segmenting/'. $s -> segment_id .'/delete')}}"
                                    onclick="deleteattemptsegment();"> delete</a>                                                     
                                </div>
                                    </div>
                                    
                            </div>                          
                            @if($s->strategy_concept)
                            @foreach($s->strategy_concept as $b)
                            <div class="card mt-3"> 
                                <div class="card-header">Strategy Concept {{$loop->iteration}} </div>
                                <div class="card-body"> 
                                <h6 class="fs-6 text-secondary" > STRATEGY CONCEPT NAME :</h6> 
                                    <h5 class="fw-normal">{{$b->strategy_concept_name}}</h5>
                                    <h6 class="fs-6 text-secondary mt-5"> STRATEGY CONCEPT DESCRIPTION :</h6> 
                                    <h5 class="fw-normal">{{$b->strategy_concept_description}}</h5>
                                    <h6 class="fs-6 text-secondary mt-5"> STRATEGY CONCEPT INDICATOR :</h6> 
                                    <h5 class="fw-normal">{{$b->strategy_concept_indicator}}</h5>
                                    @if($b->data->count()==0)
                                <h6 class="fs-6 text-secondary mt-5">GRAPH FOR INDICATOR {{$b->strategy_concept_indicator}} : </h6>
                                    <h6 class="fs-6 text-secondary mt-5">Theres no data input on this strategy concept / indicator yet</h6>
                                @else
                                
                                <h6 class="fs-6 text-secondary mt-5">GRAPH FOR INDICATOR {{$b->strategy_concept_indicator}} :</h6>
                                
                                <div class="row">
                                    <canvas class="my-3 col" id="myChart{{$b->strategy_concept_id}}" ></canvas>                                    
                                                    <script>
                                                    var xValues = [];
                                                    var yValues = [];
                                                    @foreach($b->data as $n)                                    
                                                    xValues.push({!!json_encode($n->date)!!});
                                                    yValues.push({!!json_encode($n->data)!!});
                                                    @endforeach

                                                        new Chart("myChart{{$b->strategy_concept_id}}", {
                                                        type: "bar",
                                                        data: {
                                                            labels: xValues,
                                                            datasets: [{
                                                            fill: false,
                                                            lineTension: 0,
                                                            backgroundColor: "rgba(0,0,255,1.0)",
                                                            borderColor: "rgba(0,0,255,0.1)",
                                                            data: yValues,
                                                            barThickness: 24,
                                                            barPercentage: 0.5

                                                            }]
                                                        },
                                                        options: {
                                                            legend: {display: false},
                                                            scales: {
                                                            yAxes: [{ticks: {min: 0, max: {{$b->maxdata}}+({{$b->maxdata}}*0.3) }}],                                                    
                                                            },                                                    
                                                                title:{
                                                                    display: true,
                                                                    text: "{{$b->strategy_concept_indicator}}",
                                                                    fontSize: 22,
                                                                }
                                                            
                                                        }
                                                        });
                                                    </script>
                                                    
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                    No.
                                                    </th>
                                                    <th scope="col">
                                                    Data Achieved
                                                    </th>
                                                    <th scope="col">
                                                    Month
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                            @foreach($b->data as $n)    
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$n->data}}</td>
                                                <td>{{$n->date}}</td>                                                
                                            </tr>
                                            @endforeach                                            
                                        </tbody>
                                        </table>
                                    @endif
                                </div>                               
                                <div class="my-3 mx-3">                                   

                                    <!-- Modaledit -->
                                    <div class="modal fade " id="exampleModal{{$b->strategy_concept_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form  method="POST" action="{{url('/wizard/conceptimplementation/'.$b->strategy_concept_id.'/edit')}}">
                                            @csrf 
                                            <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Strategy Concept Name</label>                               
                                                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="conceptname" rows="1" placeholder="Concept Strategy Name"  >{{$b->strategy_concept_name}}</textarea>                       
                                            </div>
                                            <h1></h1>
                                            <h1></h1>
                                            <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Strategy Description</label>                                
                                                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="conceptdescription" rows="10" placeholder="Description"  >{{$b->strategy_concept_description}}</textarea>                              
                                            </div>
                                            <h1></h1>
                                            <h1></h1>
                                            <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Indicator</label>                                
                                                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="indicator" rows="5" placeholder="Describe Indicator"  >{{$b->strategy_concept_indicator}}</textarea>                              
                                            </div>
                                            <h1></h1>
                                            <h1></h1>
                                        
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                        </div>
                                        </div>
                                        
                                    </div>
                                    </div>
                                    <a class="btn btn-sm btn-outline-primary px-5 py-2" data-toggle="modal" data-target="#exampleModal{{$b->strategy_concept_id}}">Edit</a> 
                                    <a class="btn btn-sm btn-outline-danger px-5 py-2" onclick="deleteattemptconcept();" href="{{ url('/wizard/conceptimplementation/'.$b->strategy_concept_id.'/delete')}}">delete</a>
                                     </div>
                            </div>
                               
                        @endforeach
                            @if($s->strategy_concept->count() == 0) 
                                <div> No Strategy Concept For This Segment</div>
                            @endif
                        @endif
                        </div>
                                   
                        @endforeach
                        
                        </div>
                        </div>
                    </div>
                                    </div>
                                    
                                    
                        <!--/.Slides-->
                        <div>
                        
                        </div>
                        
                        <!--/.Carousel Wrapper-->
                        
                        <div class="card">
                                <div class="card-header"><h3>Comment Section</h3></div>
                                <div id="load-comment">                                
                                </div>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                                    <script>
                                    $(document).ready(function(){
                                        $('#load-comment').load("/getcomment/{{$strategy->strategy_id}}");
                                        setInterval(function()
                                        {
                                            $('#load-comment').load("/getcomment/{{$strategy->strategy_id}}");
                                        }
                                            ,10000);
                                    });
                                    
                                    </script>     
                                <form action='/postcomment/{{$strategy->strategy_id}}' method="POST" id="formcomment">
                                @csrf             
                                <textarea class="form-control px-5" placeholder="Comment here" name="comment_input" id="commenttxtarea" ></textarea>
                                
                                    <script>
                                $("#commenttxtarea").keypress(function (e) {
                                    if(e.which === 13 && !e.shiftKey && !(document.getElementById("commenttxtarea").value.trim() == "")) {
                                        e.preventDefault();
                                    
                                        $(this).closest("form").submit();
                                    }                                    
                                });
                                </script>                    
                                </div>
                                </form>
                                
                            </div> 
                    </div>
                    
                    </div>
                    </div>
                                    <script>
                                    function deleteattemptsegment(){
                                        if (confirm("Are you sure to delete this segment?")==true){
                                            if(confirm("This Will Delete Every strategy concept and data attached for this segment")==true)                        
                                            {
                                                return true;
                                            }
                                            else{
                                            event.preventDefault();
                                            return false;
                                            }
                                        }
                                        else{
                                            event.preventDefault();
                                            return false;
                                        }
                                    } 
                                    </script>
                                     <script>
                                        function deleteattemptconcept(){
                                                if (confirm("Are you sure to delete this concept?")==true)
                                                {
                                                    if(confirm("This Will Delete Every data attached for this concept")==true)                        
                                                {
                                                    return true;
                                                }
                                                else{
                                                event.preventDefault();
                                                return false;
                                                }
                                            }
                                            else{
                                                event.preventDefault();
                                                return false;
                                            }
                                        } 
                                    </script>

        
    </body>

                        

                        
                    </div>
                </div>
            </div>
        </div>
       
        
    <footer>
        <h5>lam © 2021</h5></footer>
</html>
@endsection

 