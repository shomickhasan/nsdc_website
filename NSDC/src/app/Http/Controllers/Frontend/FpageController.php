<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Course;
use App\Models\Division;
use App\Models\Partner;
use App\Models\Employee;
use App\Models\Slider;
use Illuminate\Http\Request;

class FpageController extends Controller
{

    public  function fhome(){
       $cdata = Course::where('status',1)->where('is_show_in_home',1)->orderBy('order', 'asc')->get();

        $sliders = Slider::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $partners = Partner::where('status', 1)
            ->orderBy('order', 'asc')
            ->get();
        //dd($cdata);

        $team = Employee::where('status',1)->orderBy('order', 'asc')->get();
        //dd($team);
       return view('frontend.pages.home',compact('cdata','sliders','partners','team'));

    }

    public  function blank(Request $request){
        return view('frontend.pages.blank');
    }

    public  function courseDetails(Request $request, $slug){
        $course = Course::where('slug', $slug)->firstOrFail();
        $divisions = Division::orderBy('name')->get();
        return view('frontend.pages.course_details', compact('course','divisions'));
    }
}
