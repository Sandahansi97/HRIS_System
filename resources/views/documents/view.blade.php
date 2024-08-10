@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Applications</h2>
            </div>
             
        </div>
    </div>

    <!-- @foreach($file as $key=>$data)                
                @if($data->stage1 === 'ACCEPT')
                    <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Add New Job</a>
                </div>
                @else
                <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> NOOOOOOOOOOOOOOOOOO</a>
                </div>
                @endif
                @endforeach -->
            

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
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                <h6 class="text-white">Total Registered Users</h6> <br>
                                <h6 class="text-white">{{ $count }}</h6>
                                
                            </div>
                            
                        </div></td>
      <td><div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                <h6 class="text-white">Total Applications</h6> <br>
                                <h6 class="text-white">{{ $countapp }}</h6>
                                
                            </div>
                            
                        </div></td>
      <td><div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                <h6 class="text-white">Selected for interview</h6> <br>
                                <h6 class="text-white">{{ $countintrview }}</h6>
                                
                            </div>
                            
                        </div></td>
        <td><div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                <h6 class="text-white">Rejected Applications</h6> <br>
                                <h6 class="text-white">{{ $countrej }}</h6>
                                
                            </div>
                            
                        </div></td>
        <td><div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                                <h6 class="text-white">Onboarding Count</h6> <br>
                                <h6 class="text-white">{{ $countonb }}</h6>
                                
                            </div>
                            
                        </div></td>


    </tr>
    
  </tbody>
</table>



    <table class=" table table-bordered table-dark">
        <tr>
            <th  class="table-dark">No</th>
            <th  class="table-dark">Job Name</th>
            <th  class="table-dark">Description</th>
            <th  class="table-dark">View</th>
            <th  class="table-dark">Current status</th>
            <th  class="table-dark">CV Select or Reject</th>
            <th  class="table-dark">Send an Email</th>
            <th class="table-dark">Interview Select or Reject</th>
            <th class="table-dark">Offering Letter</th>  
            <th class="table-dark">Make as an Eployee</th> 
           
        </tr>
        @foreach($file as $key=>$data)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$data->jobrole}}</td>
            <!-- <td>{{$data->description}}</td> -->
            <td><a href= "/files/{{$data->id}}">View</a></td>
            <td><a href= "/file/download/{{$data->file}}">Download</a></td>
            <!-- status button selected or pending -->
            <td><label>CV Stage </lable><br>
                    @if($data->stage1==1)
                        <button class="btn btn-success">Selected</button>
                        @elseif($data->stage1==2)
                        <button class="btn btn-danger">Rejected</button>
                        @else
                        <button class="btn btn-warning">pending..</button>
                        @endif
                <label>Interview Stage </lable><br>
                    @if($data->interview==1)
                        <button class="btn btn-success">Selected</button>
                        @elseif($data->interview==2)
                        <button class="btn btn-danger">Rejected</button>
                        @else
                        <button class="btn btn-warning">pending..</button>
                        @endif

                <label>Send Offering letter </lable><br>
                    @if($data->offering_letter==1)
                        <button class="btn btn-success">Sent Letter</button>
                        @else
                        <button class="btn btn-warning" >pending..</button>
                        @endif

                <label>Onboarding Stage </lable><br>
                    @if($data->offering_letter==1)
                        <button class="btn btn-warning" >Waiting ..</button>
                    @endif 


            </td>



             <!-- application select button -admin  -->
             <td>
                <a href="/selected/{{$data->id}}/{{$data->uid}}" class="btn btn-primary">Mark as selected</a><br><br>
                <a href="/rejected/{{$data->id}}/{{$data->uid}}" class="btn btn-danger">Mark as rejected</a><br>
               

            </td>


            <td>  
                <!-- send email to selected applicant -->
                        <form action="/sendemail/send" method="POST" >
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label>Applicant Name</label>
                            <input type="text" name="name" class="form-control"  value={{$data->firstname}}  required />
                            </div>
                            <div class="form-group">
                            <label>Applicant Email</label>
                            <input type="text" name="email" class="form-control"  value={{$data->email}} required/>
                            </div>
                            <div class="form-group">
                            <label> Message</label>
                            <textarea name="message" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                            <input type="submit" name="send" class="btn btn-info" value="Send Email" />
                            </div>
                        </form>
                        
                        </div> 

            </td>
            <!-- interview select/reject . this shows only cv stage -->
           
            <td>
                   
            @if($data->stage1==1)
                <a href="/selectedint/{{$data->id}}/{{$data->uid}}" class="btn btn-primary">selected next step</a><br><br>
                <a href="/rejectedint/{{$data->id}}/{{$data->uid}}" class="btn btn-danger">rejected from here</a><br>
                 
                <form action="/sendemail/send" method="POST" >
                            {{ csrf_field() }}
                            <div class="form-group">
                            
                            <input type="hidden" name="name" class="form-control"  value={{$data->firstname}}  required />
                            </div>
                            <div class="form-group">
                           
                            <input type="hidden" name="email" class="form-control"  value={{$data->email}} required/>
                            </div>
                            <div class="form-group">
                            
                            <input type="hidden" name="message" class="form-control"  value="You are passed Interview" >
                            </div>
                            <div class="form-group">
                            <input type="submit" name="send" class="btn btn-info" value="Send Email" />
                            </div>
                        </form>
                        @endif 
            </td>

            <!-- send offernig letter as an email -->
            <td>
            @if($data->interview==1)
            <form action="/sendemail/send2/{{$data->id}}" method="POST" >
                            {{ csrf_field() }}
                            <div class="form-group">
                            
                            <input type="hidden" name="name" class="form-control"  value={{$data->firstname}}  required />
                            </div>
                            <div class="form-group">
                           
                            <input type="hidden" name="email" class="form-control"  value={{$data->email}} required/>
                            </div>
                            <div class="form-group">
                            
                            <input type="hidden" name="message" class="form-control"  value={{$data->jobrole}} >
                            </div>
                            <div class="form-group">
                            <input type="submit" name="send" class="btn btn-success" value="Offer Letter" />
                            </div>
                        </form>

            @endif 
            </td>

            <td>
                  @if($data->offering_letter==1)
                  <a href="/selectedint/{{$data->id}}/{{$data->uid}}" class="btn btn-primary">Make As Employee</a><br><br>

                  @endif 

            </td>
           






        </tr>
        @endforeach

     
    </table>







@endsection


