@extends('layouts.clayout')


@section('content')
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">    
    <title>Strategy Wizard - Segmentations</title> 

    

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
        <h1 class="fw-bold text-dark">2. Segmentations</h1>
        <p class="lead text-dark">Strategy Name: {{$strategy->strategy_name}}.</p>
        <p class="lead text-dark">Strategy Objective: {{$strategy->objective}}.</p>
            
          <h1 class="fw-normal text-dark pt-5 fs-3 mb-4">Create New Customer Segment For Your Strategy</h1>
            <form  method="POST" action="{{url('/wizard/'.$strategy->strategy_id.'/segmenting')}}">
            @csrf 
              <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="text-dark mb-2 ">Segment Name</label>                               
                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="segmentname" rows="1" placeholder="Segment Name" ></textarea>                       
              </div>
              <h1></h1>
              <h1></h1>
              <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="text-dark my-2 ">Value Proposition</label>                                
                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="propositionvalue" rows="3" placeholder="Value  Proposition" ></textarea>                              
              </div>
              <h1></h1>
              <h1></h1>
              <div class="form-group">
                          <label for="exampleFormControlTextarea1" class="text-dark my-2 ">Barier</label>                                
                                <textarea required class="form-control" id="exampleFormControlTextarea1" name="resistor" rows="3" placeholder="Barier (Hambatan)" ></textarea>                              
              </div>
              <h1></h1>
              <h1></h1>
              <div class="d-grid gap-2"><button type="submit" class="btn btn-primary bg-success mt-3 fw-bold fs-5">Create</button></div>     
          </form>
      </div>
    
  </section>
  </div>
  <div class="album py-5 bg-light text-white">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @if($segments)        
        @foreach($segments as $s)
        
        
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="100" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c"/>
              <text class="fw-bold" x="50%" y="50%" fill="#eceeef" dy=".3em">Segment  {{$loop->iteration}}</svg>
            <div class="card-body ">
            <h5 class="card-title text-muted fw-bold mb-4 fs-4" >{{$s->segment_name}}</h5>              
            <p class="card-text text-dark ">Segment Value = {{$s->propositionvalue}}.</p>
              <p class="card-text text-dark ">Segment Barrier = {{$s->resistor}}.</p>              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group gap-3">
                  @if($s->strategy_concept->count()==0)
                  <a class="btn btn-sm btn-outline-primary px-5" href="{{ url('/wizard/conceptselecting/'. $s -> segment_id . '')}}">Setup</a>
                  @else
                  <a class="btn btn-sm btn-outline-primary px-5" href="{{ url('/wizard/conceptselecting/'. $s -> segment_id . '')}}">Edit</a>
                  @endif
                  <a class="btn btn-sm btn-outline-danger" href="{{ url('/wizard/segmenting/'. $s -> segment_id .'/delete')}}"
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
                <small class="text-muted">Concept / Indicator : {{$s->strategy_concept->count()}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
          @if($segments->count() == 0)
          <p class="card-text text-dark ">Theres no segment created for this Strategy.</p>
          @endif
        @endif
                
    </div>
  </div>
    </body>

<footer class="bg-light text-dark py-5 ">
  <div class="container">
    <p class="float-end mb-1">
      @if($segments->count()>0)
        <a class="btn btn-sm btn-primary px-5 py-3 fs-5" href="{{ url('/strategy/'. $strategy -> strategy_id .'/details/')}}" onclick="finishattempt()">Finish Wizard</a>
                  <script>
                    function finishattempt()
                    {
                      if(confirm("Are you sure to finish the Wizard?")==true)
                      {                       
                        return true;
                    }  
                    else{
                      event.preventDefault();
                      return false;
                      }
                    }
                    </script>
      @endif
    </p>
    <p class="mb-1 text-dark"> &copy; Luthfy Aqil Mahendra 2021</p>  
  </div>
</footer>
    
     
  </body>
</html>
@endsection


