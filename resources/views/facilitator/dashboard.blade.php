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
                                                </tr>
                                            </thead>
                                            <tbody>                                            
                                            @foreach($d->data as $n)    
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$n->data}}</td>
                                                <td>{{$n->date}}</td>                                                
                                            </tr>
                                            @endforeach                                            
                                        </tbody>
                                        </table>
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

 