<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
use App\Models\User;
use DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $count = DB::table("users")->count();
        $countapp = DB::table("documents")->count();
        $countintrview = DB::table('documents')
                ->where('stage1', 1)
                ->count();;
        $countrej = DB::table('documents')
                ->where('stage1', 2)
                ->count();;
        $countonb = DB::table('documents')    //if letter send --> onboarding
                ->where('offering_letter', 1)
                ->count();;

        $file=Documents::all();
        return view('documents.view',compact('file','count','countapp','countintrview','countrej','countonb'));
        // return view('documents.view',compact('file'));
        
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('documents.create');
            // return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' =>'required',
            'phoneno' =>'required',
            
            
            'description' => 'required',
            
        ]);

        $data=new Documents;
        if($request->file('file')){
            $file=$request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/', $filename);

            $data->file= $filename;

        }

        $data->uid=$request->uid;
        $data->firstname=$request->firstname;
        $data->lastname=$request->lastname;
        $data->email=$request->email;
        $data->phoneno=$request->phoneno;
        $data->jobrole=$request->jobrole;
        
        $data->description=$request->description;
        // $data->user_id=$request->user_id;
        $data->save();
        // return redirect()->back();
        return redirect()->back()->with('success','Application Submitted successfully.');
       
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Documents::find($id);
        return view('documents.details',compact('data'));
  
    }

    public function download($file)
    {
        
       return response()->download('storage/'.$file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    //update status 
    public function Updatestatus($id, $uid)
    {
        $data=Documents::find($id);
        $data->stage1=1;
        $data->save();

        // $data=User::find($id);  //without uid
        $data=User::find($uid);
        $data->application_stage=1;
        $data->save();

        return redirect()->back();
    }
    //rejected status
    public function Updatestatusrejected($id , $uid)  
    {
        $data=Documents::find($id);
        $data->stage1=2;
        $data->save();

        $data=User::find($uid); 
        $data->application_stage=2;
        $data->save();
        return redirect()->back();
    }




     //update status  interview
     public function UpdatestatusInt($id, $uid)
     {
         $data=Documents::find($id);
         $data->interview=1;
         $data->save();
 
         // $data=User::find($id);  //without uid
         $data=User::find($uid);
         $data->interview_stage=1;
         $data->save();
 
         return redirect()->back();
     }
     //rejected status interview
     public function UpdatestatusrejectedInt($id , $uid)  
     {
         $data=Documents::find($id);
         $data->interview=2;
         $data->save();
 
         $data=User::find($uid); 
         $data->interview_stage=2;
         $data->save();
         return redirect()->back();
     }
 

    // public function Updatestatusrejected2($id)
    // {
        
    //     $data=User::find($id);
    //     $data->application_stage=2;
    //     $data->save();
    //     return redirect()->back();
    // }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $post->delete();

        // return redirect()->back()
        //                 ->with('success','post deleted successfully');
    }
}
 