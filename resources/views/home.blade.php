






            <body class="antialiased">
              
    
    <div class="jumbotron text-center" style="margin-bottom:0" id="well">
    
<div class="card">
                <div class="card-header">{{ __('Hello') }}   {{ Auth::user()->name }} {{ __(',   ') }} 

                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    </div>

                    <!-- display status button when users log in -->
                    @if(Auth::user()->utype === 'USER')
                      @if(Auth::user()->application_stage ==='1')
                      <button class="btn btn-success">Selected</button>
                      @elseif(Auth::user()->application_stage ==='2')
                      <button class="btn btn-danger">Rejected</button>
                      @else
                      <button class="btn btn-warning">pending..</button>
                      @endif
                    @endif
            </div>
    
    <!-- nav bar -->
    @extends('layouts.app')
    @section('content')
    <!--<div class="max-w-6xl mx-auto sm:px-7 lg:px-10">--> 
        <!--<div class="flex justify-left pt-8 sm:justify-start sm:pt-1">--> 

        
    </div>
    <img src="{{asset('assets/images/logo.png')}}" width="220" height="90"  >
        <h1><b><p>Dumindu Industries (Pvt) Ltd</p></b></h1>
        
    



  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('assets/images/slide2.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('assets/images/2nd.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('assets/images/3rd.jpg')}}" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>









    
    @endsection
    
    </body>
