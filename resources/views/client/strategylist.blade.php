@extends('layouts.postlogin')


@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/user.css">
    <!-- Bootstrap core CSS -->
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
    <title>My Strategy List</title>
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
                <h1>Strategy List</h1>
                <p class="author"><strong>TA</strong> <span class="text-muted">2021 </span></p>
            </div>
            <div class="col-md-6 post-body">
                <p>Customer Network Strategy Generator</p>
                <p>This is list of your strategy</p>
                <p></p>
            </div>
        </div>
    </div>
</body>
                <div class="album py-5  text-dark">
                    <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @if($strategy)
                        @foreach($strategy as $s)
                        <div class="col">
                        <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="100" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Strategy  {{$loop->iteration}}</svg>
                            <div class="card-body ">
                            <h5 class="card-title text-dark fw-bold" >{{$s->strategy_name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Strategy Objective = {{$s->objective}}.</h6>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div class="btn-group gap-2">
                                <a class="btn btn-sm btn-outline-success"  href="{{ url('/strategy/'. $s ->strategy_id . '/details')}}">Details</a> 
                                <a class="btn btn-sm btn-outline-primary" href="{{ url('/wizard/'. $s ->strategy_id . '/define')}}">Edit</a>
                                <a class="btn btn-sm btn-outline-danger " onclick="deleteattempt();" href="{{ url('/wizard/'. $s ->strategy_id . '/delete')}}">Delete</a>  
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
                                <small class="text-muted">facilitator : {{$s->name}}</small>
                            </div>
                            </div>
                        </div>
                        </div>
                        @endforeach
                        @if($strategy->count()==0)
                        <p class="card-text text-dark ">Theres no strategy created yet.</p>
                        @endif
                        @endif
                        
                        

                        
                    </div>
                </div>
            </div>
        </div>
       
        
    <footer>
        <h5>kita © 2020</h5></footer>
</html>
@endsection

@section('scripts')

@endsection
 

