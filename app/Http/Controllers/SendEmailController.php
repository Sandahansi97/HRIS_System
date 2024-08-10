<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SendLetter;
use App\Models\Documents;

class SendEmailController extends Controller
{
    function index()
    {
     return view('send_email');
    }

    // send normal emal
    function send(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email',
    //   'message' =>  'required'
     ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );





     Mail::to($request->email)->send(new SendMail($data));
     return back()->with('success', 'Email sent Successfully');

     

    }



    //send offering letter
    function send2(Request $request , $id)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email',
    //   'message' =>  'required'
     ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message 
            
        );


        $data=Documents::find($id);
        $data->offering_letter=1;
        $data->save();

        // $data=Documents::find($id);
        // $data->stage1=1;
        // $data->save();







     Mail::to($request->email)->send(new SendLetter($data));
     return back()->with('success', 'Email sent Successfully');

     

    }


}

