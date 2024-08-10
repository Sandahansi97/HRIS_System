@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> JOB POSTS</h2>
            </div>
            @if (Route::has('login'))
            @auth
                @if(Auth::user()->utype === 'ADMIN')
                    <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Add New Job</a>
                </div>
                @else
                @endif
                @endauth
                @endif
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


         <!-- user counts  -->
<table class="table">

<tbody>
  <tr>
    
    <td><div class="card card-hover">
                          <div class="box bg-info text-center">
                              <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                              <h6 class="text-white">Total Job Posts</h6> <br>
                              <h6 class="text-white">{{ $countpost  }}</h6>
                              
                          </div>
                          
                      </div></td>
    <td><div class="card card-hover">
                          <div class="box bg-success text-center">
                              <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                              <h6 class="text-white">Total opennings</h6> <br>
                              <h6 class="text-white">{{ $countopen }}</h6>
                              
                          </div>
                          
                      </div></td>
   

  </tr>
  
</tbody>
</table>

    <table class=" table table-bordered table-dark">
        <tr>
             <th>Job Code</th> 
            <th>Job Name</th> 
            <th>Qualifications</th>
            <th>Number of openings</th>
            <th>Description</th>
            @if (Route::has('login'))
            @auth
            @if(Auth::user()->utype === 'ADMIN')
            <th>Action</th>
            @endif
            @endauth
                @endif

        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->jobcode }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->qualification }}</td>
            <td>{{ $post->numberofopenings }}</td>
            <td>{{ $post->description }}</td>
            
                <!-- Edit, delete buttons only show admin -->
                @if (Route::has('login'))
                @auth
                @if(Auth::user()->utype === 'ADMIN')
                <td>
                     <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                     <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>

                <td>
                </td>

                @else
                @endif
                @endauth
                @endif


            
        </tr>
        @endforeach
    </table>

    @if (Auth::guest())
                <div class="pull-left">
                            <a class="btn btn-success" href="files/create"> Apply Job</a>
                            </div>
    @endif
    @if (Route::has('login'))
                @auth
                @if(Auth::user()->utype === 'USER')
                <div class="pull-left">
                            <a class="btn btn-success" href="files/create"> Apply Job</a>
                            </div>
                @else
                @endif
                @endauth
                @endif

               

@endsection