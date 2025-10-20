<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\FieldConfiguration;
use Illuminate\Support\Facades\DB;

class FielConfigurationController extends Controller
{
    public function index()
    {
        $fields = FieldConfiguration::all();
        return view('backend.pages.field.create',compact('fields'));
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            foreach ($request->except('_token') as $name => $label_name) {
                $field = FieldConfiguration::where('name', $name)->first();
                if ($field) {
                    $field->update([
                        'lable_name' => $label_name,
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('fields.index')->with('message','Field Create SuccessFully');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('fileds.index')->with('error',self::DEFAULT_ERROR_MESSAGE); 
        }
    }

}
