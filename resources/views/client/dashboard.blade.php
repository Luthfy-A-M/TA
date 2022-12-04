@extends('layouts.postlogin')


@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strategy {{$strategy->strategy_name}} Dashboard </title>
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
                <h1>Strategy Dashboard</h1>
                <p class="author"><strong>TA</strong> <span class="text-muted">2021 </span></p>
            </div>
            <div class="col-md-6 post-body">
                <p>Customer Network Strategy Generator</p>
                <p>This is full dashboard of your strategy</p>
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
                                <a class="btn btn-primary px-5" href="{{ url('/strategy/'. $strategy ->strategy_id . '/details')}}" > Strategy Details</a>
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
                                        function deleteattemptdata(){
                                            if (confirm("Are you sure to delete this data?")==true)
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
                    <div class="card shadow-sm"> 
                        <div class="card-header">
                            <h4>Segments for this Strategy : {{$segments->count()}} segments</h4>
                        </div> 
                    </div> 
                     
                        @foreach($segments as $s)
                        <div class="card my-4 ">
                        <div class="card-header bg-white">
                                <h3>{{$s->segment_name}}</h3>
                        </div>
                        
                            @foreach($s->strategy_concept as $d)
                                @if($d->data->count()==0)
                                    <a>Indicator: {{$d->strategy_concept_indicator}} </a>
                                    <a>Theres no data input on this strategy concept / indicator yet</a>
                                @else
                                
                                <div class="row">
                                    <canvas class="my-3 col" id="myChart{{$d->strategy_concept_id}}" ></canvas>                                    
                                                    <script>
                                                    var xValues = [];
                                                    var yValues = [];
                                                    @foreach($d->data as $n)                                    
                                                    xValues.push({!!json_encode($n->date)!!});
                                                    yValues.push({!!json_encode($n->data)!!});
                                                    @endforeach

                                                        new Chart("myChart{{$d->strategy_concept_id}}", {
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
                                                            yAxes: [{ticks: {min: 0, max: {{$d->maxdata}}+({{$d->maxdata}}*0.3) }}],                                                    
                                                            },                                                    
                                                                title:{
                                                                    display: true,
                                                                    text: "{{$d->strategy_concept_indicator}}",
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
                                                    <th scope="col">
                                                    Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                            @foreach($d->data as $n)    
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$n->data}}</td>
                                                <td>{{$n->date}}</td>
                                                <td>
                                                <!-- Modaledit Individual data --> 
                                                <div class="modal fade " id="exampleModaldata{{$n->data_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form  method="POST" action="{{url('strategy/'.$strategy->strategy_id.'/data/'.$n->data_id.'/edit')}}">
                                                            @csrf 
                                                            <div class="form-group">
                                                                        <label for="exampleFormControlTextarea1">Data Achieved</label>                               
                                                                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="data" rows="1" placeholder="Data Achieved"  >{{$n->data}}</textarea>                       
                                                            </div>                                                  
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </form>
                                                        </div>
                                                        </div>
                                                        
                                                    </div>
                                                    </div>                                                    
                                                    <a class="btn btn-sm btn-outline-primary px-3" data-toggle="modal" data-target="#exampleModaldata{{$n->data_id}}">Edit Data</a>
                                                    <!--End of Modaledit Individual data -->
                                                    <a class="btn btn-sm btn-outline-danger px-3" onclick="deleteattemptdata();" href="{{url('strategy/'.$strategy->strategy_id.'/data/'.$n->data_id.'/delete')}}" >Delete</a>
                                                </td>

                                            </tr>
                                            @endforeach                                            
                                        </tbody>
                                        </table>

                                        <!-- Modaledit data indicator -->
                                    <div class="modal fade " id="exampleModal{{$d->strategy_concept_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit data indicator (strategy concept)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form  method="POST" action="{{url('/wizard/conceptimplementation/'.$d->strategy_concept_id.'/edit')}}">
                                            @csrf 
                                            <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Strategy Concept Name</label>                               
                                                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="conceptname" rows="1" placeholder="Concept Strategy Name"  >{{$d->strategy_concept_name}}</textarea>                       
                                            </div>
                                            <h1></h1>
                                            <h1></h1>
                                            <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Strategy Description</label>                                
                                                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="conceptdescription" rows="10" placeholder="Description"  >{{$d->strategy_concept_description}}</textarea>                              
                                            </div>
                                            <h1></h1>
                                            <h1></h1>
                                            <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Indicator</label>                                
                                                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="indicator" rows="5" placeholder="Describe Indicator"  >{{$d->strategy_concept_indicator}}</textarea>                              
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
                                    <div class="my-3 mx-3">
                                    
                                    <button type="button" class="btn btn-success px-5" data-toggle="modal" data-target="#adddataconceptModal{{$d->strategy_concept_id}}" >
                                    Add Data indicator
                                    </button>
                                    <!-- Modaladddata -->
                                    <div class="modal fade " id="adddataconceptModal{{$d->strategy_concept_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Data indicator</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form  method="POST" action="{{ url('/strategy/'.$strategy->strategy_id.'/concept/'.$d->strategy_concept_id.'/add')}}">
                                            @csrf                                             
                                            <div class="card shadow-sm"> 
                                                <div class="card-header">Segment :{{$b->strategy_concept_name}} </div>
                                                <div class="card-body">
                                                    <div class="form-group">                                                        
                                                        <label for="exampleFormControlTextarea1{{$d->strategy_concept_id}}">Achieved?  {{$d->strategy_concept_indicator}}</label>                               
                                                                <input required type="number" class="form-control" id="exampleFormControlTextarea1{{$d->strategy_concept_id}}" name="data" rows="1" placeholder="Achieved/Gain (data)"  >                                                                              
                                                    </div>
                                                </div>
                                            </div>      
                                            <h1></h1>
                                            <h1></h1>
                                            <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Date : (Month/year)</label>                                
                                                        <div class="well">
                                                        <input type="text" class="form-control" name="date" id="datepicker{{$d->strategy_concept_id}}" required onkeypress="return false;" />
                                                                    <script>
                                                                    $("#datepicker{{$d->strategy_concept_id}}").datepicker( {
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

                                    <a class="btn btn-sm btn-outline-primary px-5 py-2" data-toggle="modal" data-target="#exampleModal{{$d->strategy_concept_id}}">Edit Indicator</a>
                                                    </div>
                                    @endif                                       
                                    @endforeach
                                                                           
                        </div>
                                           
                        @endforeach
                         
                    </div>
                    
                    </div>
                    </div>
                                    

        
    </body>

                        

                        
                    </div>
                </div>
            </div>
        </div>
       
        
    <footer>
        <h5>lam © 2021</h5></footer>
</html>
@endsection

 