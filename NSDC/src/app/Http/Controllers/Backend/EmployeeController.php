<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('order','asc')->paginate(20);

        return view('backend.pages.employee.index', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:200',
            'image' => 'required'
        ]);

        $data = $request->all();

        // image upload
        $data['image'] = $request->hasFile('image')
            ? $this->uploadImage($request,'image','uploads/employees')
            : null;

        // order auto
        $data['order'] = (Employee::max('order') ?? 0) + 1;

        Employee::create($data);

        return back()->with('success','Employee Created');
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $this->uploadImage($request,'image','uploads/employees');
        }

        $employee->update($data);

        return back()->with('success','Employee Updated');
    }



    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();

        return response()->json(['status'=>true]);
    }

    public function orderUpdate(Request $request)
    {
        foreach ($request->order as $item) {

            Employee::where('id',$item['id'])
                ->update(['order'=>$item['position']]);

        }

        return response()->json(['status'=>true]);
    }


}
