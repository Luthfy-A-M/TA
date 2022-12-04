@extends('layouts.clayout')


@section('content')
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">    
    <title>Strategy Wizard - Define Main Objective</title>
    

    

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
    
  </head>
  <body>
    


    

  <section class="py-5 text-left container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-bold text-dark">1. Define Main Objective</h1>        
        <p class="lead text-dark">Tentukan Tujuan Utama Untuk Strategi Anda.</p>
    
        @if($strategy)        
        <h1 class="fw-normal text-dark pt-5 fs-3 mb-4">Change Your Strategy</h1>             
                    <form  method="POST" action="{{url('/wizard/'.$strategy->strategy_id.'/define')}}">
                             @else
                    <h1 class="fw-normal text-dark pt-5 fs-3 mb-4">Create Your Strategy</h1>               
                         <form  method="POST" action="/wizard">
                             @endif
                             <h1></h1>
                            <h1></h1>  
                         @csrf   
                         <div class="form-group">
                                <label for="exampleFormControlTextarea1"class="text-dark mb-2 ">Strategy Name</label>
                                @if($strategy)
                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="strategyname" rows="1" >{{$strategy->strategy_name}}</textarea>
                                @else
                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="strategyname" rows="1" placeholder="Strategy Name" ></textarea>
                                @endif
                            </div>
                            <h1></h1>
                            <h1></h1>
                         <div class="form-group">
                                <label for="exampleFormControlTextarea1"class="text-dark my-2 ">Define Main Objective</label>
                                @if($strategy)
                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="objective" rows="3" placeholder="Main Objective" >{{$strategy->objective}}</textarea>
                                @else
                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="objective" rows="3" placeholder="Main Objective" ></textarea>
                                @endif
                            </div>
                            <h1></h1>
                            <h1></h1>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"class="text-dark my-2 ">Choose Facilitator</label>
                                <select required class="form-control text-black" id="exampleFormControlSelect1" name="facilitator">
                                    @if($strategy)
                                <option>{{$currentfacilitator ->name}}-{{$currentfacilitator ->email}}</option>
                                    @endif
                                    @foreach($facilitator as $f)
                                <option>{{$f -> name}}-{{$f->email}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h1></h1>
                            <h1></h1>                            
                            <div class="d-grid gap-2"><button type="submit" class="btn btn-primary bg-success mt-3 fw-bold fs-5">Submit</button></div>
                         </form>                   
          </div>
  </section>

  
    </body>

<footer class="text-dark py-5 ">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1 text-dark"> &copy; Luthfy Aqil Mahendra 2021</p>  
  </div>
</footer>
    
     
  </body>
</html>
@endsection