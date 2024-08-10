@extends('layouts.app')
@section('content')

<head>
    <title>FirstName4</title>
</head>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



<h2>{{$data->FirstName}}</h2>
<!-- <h3>{{$data->description}}</h3> -->
<p>
  <iframe src="{{url('storage/'.$data->file)}}" style="width: 1200px;
   height: 1000px;"></iframe>
    </p>

    @endsection

