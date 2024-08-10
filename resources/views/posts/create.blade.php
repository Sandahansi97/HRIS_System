@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>JOB Code:</strong>
                <input type="text" name="jobcode" class="form-control" placeholder="jobcode" required>
            </div>
        </div> 

<!-- <div class="row">--> 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Job Name:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
        </div> 

        <!--<div class="row">--> 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Qualifications:</strong>
                <input type="text" name="qualification" class="form-control" placeholder="qualification" required>
            </div>
        </div>

        <!--<div class="row">--> 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Number of openings:</strong>
                <input type="Number" name="numberofopenings" class="form-control" placeholder="numberofopenings">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description" required></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection