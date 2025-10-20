<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Backend\ActivityLog;

class ActivityLogController extends Controller
{
    public function index(Request $request){
        if(request()->ajax()){
            $activity = ActivityLog::with(['creator:id,full_name'])->get();
            return DataTables::of($activity)
                ->addColumn('formated_date', function($row) {
                    return $row->created_at->format('Y-m-d H:i:s'); // Adjust the format as needed
                })
               ->make(true);
        }
        return view('backend.pages.activity_log.index');
    }
}
