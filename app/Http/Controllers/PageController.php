<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function index()
    {
        return view('aboutus');
    }

    public function jobs()
    {
        return view('jobs');
    }
    
    

}
 