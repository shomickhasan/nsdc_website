<?php

namespace App\Http\Controllers\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;

class ResponseController extends Controller
{
    public function district(Request $request)
    {
        if(isset($request->division_id)){
            $divisionId = $request->division_id;
            $districts = District::where('division_id',$divisionId)->get();

            return response()->json([
                'status' => 'success',
                'data' => $districts->isEmpty() ? null : $districts
            ]);
        }
    }
}
