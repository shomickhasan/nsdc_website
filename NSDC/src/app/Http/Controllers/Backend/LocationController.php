<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\PostOffice;
use App\Models\Upazila;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function districts($division_id)
    {
        $districts = District::where('division_id', $division_id)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return response()->json($districts);
    }

    public function upazilas($district_id)
    {
        $upazilas = Upazila::where('district_id', $district_id)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return response()->json($upazilas);
    }

    public function postOffices($upazila_id)
    {
        $postOffices = PostOffice::where('upazila_id', $upazila_id)
            ->select('id', 'name', 'post_code')
            ->orderBy('name')
            ->get();

        return response()->json($postOffices);
    }

}
