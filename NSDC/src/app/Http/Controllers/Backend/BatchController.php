<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatchCreateRequest;
use App\Models\Backend\BatchModel;
use App\Models\Backend\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = BatchModel::with('course')->latest()->paginate(10);
        return view('backend.pages.batch.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::where('status', 1)
            ->select('id', 'title') // বা course_name
            ->latest()
            ->get();
        return view('backend.pages.batch.create', compact('courses'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BatchCreateRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = $data['slug']
            ? \Str::slug($data['slug'])
            : \Str::slug($data['batch_name']);

        BatchModel::create($data);
        return redirect()->route('batch.index')->with('success', 'Batch created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $batch = BatchModel::findOrFail($id);

        $courses = Course::where('status', 1)
            ->select('id', 'title')
            ->get();

        return view('backend.pages.batch.edit', compact('batch', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $batch = BatchModel::findOrFail($id);

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'batch_name' => 'required',
            'batch_code' => 'required|unique:batch_models,batch_code,' . $id,
            'slug' => 'nullable|unique:batch_models,slug,' . $id,
            'status' => 'required|in:0,1,2,3',
        ]);

        $batch->update([
            'course_id' => $request->course_id,
            'batch_name' => $request->batch_name,
            'batch_code' => $request->batch_code,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->batch_name),
            'status' => $request->status,
            'open_at' => $request->open_at,
            'complete_at' => $request->complete_at,
        ]);

        return redirect()->route('batch.index')->with('success','Batch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $batch = BatchModel::findOrFail($request->id);
        $batch->status = $request->status;
        $batch->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully'
        ]);
    }
}
