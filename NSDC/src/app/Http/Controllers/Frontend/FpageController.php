<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FpageController extends Controller
{

    public  function fhome(){
       return view('frontend/pages/home');
    }

    public  function blank(Request $request){
        return view('frontend/pages/blank');
    }
}
