@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Application form</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="/posts"> Back</a>
            
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="/files" method="POST" enctype="multipart/form-data">
@csrf
<!-- 
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="First Name" class="form-control" placeholder="First Name" required>
            </div>
        </div> -->

      
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Last Name:</strong>
                <input type="text" name="Last Name" class="form-control" placeholder="Last Name" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Email Address:</strong>
                <input type="text" name="Email" class="form-control" placeholder="Email" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Phone No:</strong>
                <input type="text" name="Phone no" class="form-control" placeholder="Phone No" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Second No:</strong>
                <input type="text" name="Second No" class="form-control" placeholder="Second No" required>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Job Role:</strong>
                <input type="text" name="Job Role"  class="form-control" placeholder="Job Role" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Upload CV :</strong>
                <input type="file" name="file" class="form-control" required>
            </div>
        </div>
         -->

         


        <!-- <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Job Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
        </div>--> 

        <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Applicant Id:</strong>
                <input type="hidden"  value="{{ Auth::user()->id }}" name="uid" class="form-control" >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" value="{{ Auth::user()->name }}" name="firstname" class="form-control" placeholder="First Name" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                <input type="text"  value="{{ Auth::user()->lastname }}" name="lastname" class="form-control" placeholder="Last Name" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text"  value="{{ Auth::user()->email }}" name="email" class="form-control" placeholder="Email" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone No:</strong>
                <input type="text" name="phoneno" class="form-control" placeholder="Phone No" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Job Role:</strong>
                <input type="text" name="jobrole" class="form-control" placeholder="Job Role" required>
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <label for="title">Select State:</label>
            

            </div> -->
       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description" required></textarea>
            </div>
        </div>

        


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Upload CV :</strong>
                <input type="file" name="file" class="form-control" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>


      

<!-- <form action= "/files" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type= "text" name="title" placeholder="title" required>
    <input type= "text" name="description" placeholder="description" required>
    <input type= "file" name="file" required>
    <input type="submit" value="Submit">
</form> -->


@endsection





