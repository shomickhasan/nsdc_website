<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Models\Uddokta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DhashboardController extends Controller
{
    public function index(){
      //dd(Auth::user()->photo);
        $data['fusionCloth'] = [];
        return view('backend.pages.dashboard',compact('data'));
    }
}