<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CourseCreateRequest;
use App\Http\Requests\Backend\CourseUpdateRequest;
use App\Models\Backend\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        // Get courses with pagination 20 per page
        $courses = Course::orderBy('created_at', 'desc')->paginate(20);
        return view('backend.pages.course.index', compact('courses'));
    }

    public function create()
    {
        return view('backend.pages.course.create');
    }

    public function store(CourseCreateRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        $data['picture'] = $request->hasFile('picture')
            ? $this->uploadImage($request, 'picture', 'uploads/courses')
            : 'uploads/courses/default-course.png';

        // Auto-generate slug from title if empty
        $data['slug'] = !empty($data['slug']) ? $data['slug'] : Str::slug($data['title']);

        // Create course
        Course::create($data);

        return redirect()->back()->with('message', 'Course created successfully!');
    }

    public function edit(Course $course)
    {

        return view('backend.pages.course.edit', compact('course'));
    }

    public function update(CourseUpdateRequest $request, Course $course)
    {
        try {
            $data = [
                'title' => $request->title,
                'duration' => $request->duration,
                'short_des' => $request->short_des,
                'long_des' => $request->long_des,
                'course_fee' => $request->course_fee,
                'status' => $request->status,
                'is_show_in_home' => $request->is_show_in_home,
            ];

            if ($request->hasFile('picture')) {
                if ($course->picture && Storage::exists($course->picture)) {
                    Storage::delete($course->picture);
                }

                $data['picture'] = $request->file('picture')->store('uploads/courses', 'public');
            }

            $course->update($data);

            return redirect()
                ->route('course.index')->with('message', 'Course updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update course: ' . $e->getMessage());
        }
    }
}
