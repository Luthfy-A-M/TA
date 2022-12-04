@extends('layouts.postloginfaci')


@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilitator Landingpage</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('segmentbootstrap/css/bootstrap.min.css')}}" rel="stylesheet">   
    <link rel="stylesheet" href="/css/user.css">
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
                <h1>Network Strategy Generator</h1>
                <p class="author"><strong>TA</strong> <span class="text-muted">2021 </span></p>
            </div>
            <div class="col-md-6 col-md-offset-0 post-body">
                <p>Customer Network Strategy Generator</p>
                <a class="btn btn-outline-success px-4 py-3" href="/facilitator/showstrategylist">See Your Strategy List</a>
                <figure><img class="img-thumbnail" src="/img/33.jpg">
                    <figcaption> Customer Network Strategy </figcaption>
                </figure>
                <p></p>
            </div>
        </div>
    </div>
</body>
 
        
    <footer>
        <h5>kita © 2020</h5></footer>
</html>
@endsection
