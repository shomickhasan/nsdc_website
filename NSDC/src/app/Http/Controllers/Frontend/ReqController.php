<?php

namespace App\Http\Controllers\Frontend;

use App\Exports\RegistrationExport;
use App\Http\Controllers\Controller;
use App\Models\Backend\BatchModel;
use App\Models\Backend\Course;
use App\Http\Requests\Backend\RegReq;
use App\Jobs\RegistrationPDFEmailJob;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use App\Models\Backend\Regestration;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReqController extends Controller
{

    public function store(RegReq $request)
    {
        try {
            $data = $request->all();

            if ($request->filled('same_as_permanent')) {
                $data['present_division_id'] = $request->permanent_division_id;
                $data['present_district_id'] = $request->permanent_district_id;
                $data['present_upazila_id'] = $request->permanent_upazila_id;
                $data['present_post_office'] = $request->permanent_post_office;
                $data['present_address'] = $request->permanent_address;
                $data['same_as_permanent'] = 1;
            } else {
                $data['same_as_permanent'] = 0;
            }

            $data['photo'] = $request->hasFile('photo')
                ? $this->uploadImage($request, 'photo', 'uploads/registrations/photos')
                : 'uploads/registrations/photos/default-photo.png';

            $data['signature'] = $request->hasFile('signature')
                ? $this->uploadImage($request, 'signature', 'uploads/registrations/signatures')
                : 'uploads/registrations/signatures/default-signature.png';

            $registration = Regestration::create($data);

            if (!empty($registration->email)) {
                RegistrationPDFEmailJob::dispatch($registration->id, $registration->email);
            }

            return response()->json([
                'status' => true,
                'message' => 'Registration submitted successfully!',
                'id' => $registration->id,
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Registration Save Error: ' . $e->getMessage());
            \Log::error('Registration Save Error Line: ' . $e->getLine());
            \Log::error('Registration Save Error File: ' . $e->getFile());

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong while submitting the registration.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function index(Request $request)
    {
        $userFilters = $request->only(['name', 'from_date', 'to_date', 'course_id']);
        $filters = array_merge($userFilters, ['admission_status' => 'pending']);
        $hasFilters = collect($userFilters)->filter(fn ($value) => filled($value))->isNotEmpty();
        $courses = Course::where('status', 1)
            ->orderBy('title')
            ->get(['id', 'title']);
        $courseBatches = collect();

        if (!empty($filters['course_id'])) {
            $courseBatches = BatchModel::where('course_id', $filters['course_id'])
                ->whereIn('status', [BatchModel::STATUS_OPEN, BatchModel::STATUS_FULL])
                ->orderBy('batch_name')
                ->get(['id', 'batch_name', 'batch_code', 'status']);
        }

        if ($hasFilters) {
            $registrations = Regestration::with(['course', 'batch'])
                ->filter($filters)
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->appends($filters);
        } else {
            $registrations = new LengthAwarePaginator(
                collect(),
                0,
                10,
                1,
                ['path' => $request->url(), 'query' => $filters]
            );
        }

        if ($request->ajax()) {
            return view('backend.pages.reg.partial', compact('registrations', 'hasFilters', 'courseBatches', 'filters'))->render();
        }

        return view('backend.pages.reg.index', compact('registrations', 'filters', 'courses', 'hasFilters', 'courseBatches'));
    }

    public function students(Request $request)
    {
        $userFilters = $request->only(['name', 'course_id', 'batch_id']);
        $filters = array_merge($userFilters, ['admission_status' => 'admitted']);
        $hasFilters = collect($userFilters)->filter(fn ($value) => filled($value))->isNotEmpty();

        $courses = Course::where('status', 1)
            ->orderBy('title')
            ->get(['id', 'title']);

        $batches = BatchModel::with('course')
            ->orderBy('batch_name')
            ->get(['id', 'course_id', 'batch_name', 'batch_code', 'status']);

        if ($hasFilters) {
            $students = Regestration::with(['course', 'batch'])
                ->filter($filters)
                ->orderByDesc('admitted_at')
                ->orderByDesc('created_at')
                ->paginate(15)
                ->appends($request->only(['name', 'course_id', 'batch_id']));
        } else {
            $students = new LengthAwarePaginator(
                collect(),
                0,
                15,
                1,
                ['path' => $request->url(), 'query' => $userFilters]
            );
        }

        if ($request->ajax()) {
            return view('backend.pages.students.partial', compact('students', 'hasFilters'))->render();
        }

        return view('backend.pages.students.index', compact('students', 'filters', 'courses', 'batches', 'hasFilters'));
    }

    public function show($id)
    {
        $reg = $this->findRegistrationWithRelations($id);

        return view('backend.pages.reg.show', compact('reg'));
    }

    public function edit($id)
    {
        $reg = $this->findRegistrationWithRelations($id);
        $courses = Course::orderBy('title')
            ->get(['id', 'title']);
        $batches = BatchModel::orderBy('batch_name')
            ->get(['id', 'course_id', 'batch_name', 'batch_code', 'status']);
        $divisions = Division::orderBy('name')->get(['id', 'name']);
        $districts = District::orderBy('name')->get(['id', 'division_id', 'name']);
        $upazilas = Upazila::orderBy('name')->get(['id', 'district_id', 'name']);

        return view('backend.pages.reg.edit', compact('reg', 'courses', 'batches', 'divisions', 'districts', 'upazilas'));
    }

    public function update(RegReq $request, $id)
    {
        $registration = Regestration::findOrFail($id);
        $data = $request->validated();
        $admissionStatus = $request->input('admission_status', 'pending');

        if ($admissionStatus === 'admitted' && $request->filled('batch_id')) {
            $batch = BatchModel::find($request->batch_id);

            if (!$batch || (int) $batch->course_id !== (int) $request->course_id) {
                return back()
                    ->withErrors(['batch_id' => 'Selected batch must belong to the selected course.'])
                    ->withInput();
            }
        }

        if ($request->filled('same_as_permanent')) {
            $data['present_division_id'] = $request->permanent_division_id;
            $data['present_district_id'] = $request->permanent_district_id;
            $data['present_upazila_id'] = $request->permanent_upazila_id;
            $data['present_post_office'] = $request->permanent_post_office;
            $data['present_address'] = $request->permanent_address;
            $data['same_as_permanent'] = 1;
        } else {
            $data['same_as_permanent'] = 0;
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $this->uploadImage($request, 'photo', 'uploads/registrations/photos');
        } else {
            unset($data['photo']);
        }

        if ($request->hasFile('signature')) {
            $data['signature'] = $this->uploadImage($request, 'signature', 'uploads/registrations/signatures');
        } else {
            unset($data['signature']);
        }

        $data['batch_id'] = $request->filled('batch_id') ? $request->batch_id : null;
        $data['admission_status'] = $admissionStatus;

        if ($data['admission_status'] === 'admitted') {
            $data['admitted_at'] = $request->filled('admitted_at')
                ? \Carbon\Carbon::parse($request->admitted_at)
                : ($registration->admitted_at ?: now());
        } else {
            $data['batch_id'] = null;
            $data['admitted_at'] = null;
        }

        $registration->update($data);

        return redirect()
            ->route('registration.show', $registration->id)
            ->with('message', 'Registration updated successfully.');
    }

    public function pdf($id)
    {
        $reg = $this->findRegistrationWithRelations($id);

        return Pdf::loadView('frontend.pdf.registration_pdf', compact('reg'))
            ->setPaper('A4', 'portrait')
            ->download('Registration_' . $reg->id . '.pdf');
    }

    public function export(Request $request)
    {
        $filters = $request->only(['name', 'from_date', 'to_date', 'course_id']);
        $hasFilters = collect($filters)->filter(fn ($value) => filled($value))->isNotEmpty();

        if (!$hasFilters) {
            return redirect()
                ->route('registration.index')
                ->with('error', 'Please select at least one filter before exporting.');
        }

        return Excel::download(
            new RegistrationExport($filters),
            'registrations_' . now()->format('Y_m_d_H_i_s') . '.xlsx'
        );
    }

    public function studentsExport(Request $request)
    {
        $userFilters = $request->only(['name', 'course_id', 'batch_id']);
        $filters = array_merge($userFilters, ['admission_status' => 'admitted']);
        $hasFilters = collect($userFilters)->filter(fn ($value) => filled($value))->isNotEmpty();

        if (!$hasFilters) {
            return redirect()
                ->route('students.index')
                ->with('error', 'Please select at least one filter before exporting.');
        }

        return Excel::download(
            new RegistrationExport($filters),
            'students_' . now()->format('Y_m_d_H_i_s') . '.xlsx'
        );
    }

    public function bulkAdmission(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'batch_id' => 'required|exists:batch_models,id',
            'registration_ids' => 'required|array|min:1',
            'registration_ids.*' => 'integer|exists:regestrations,id',
        ], [
            'registration_ids.required' => 'Please select at least one registration.',
            'batch_id.required' => 'Please select a batch.',
        ]);

        $batch = BatchModel::where('id', $data['batch_id'])
            ->where('course_id', $data['course_id'])
            ->where('status', BatchModel::STATUS_OPEN)
            ->first();

        if (!$batch) {
            return response()->json([
                'status' => false,
                'message' => 'Selected batch is invalid for this course or not open.',
            ], 422);
        }

        $registrations = Regestration::whereIn('id', $data['registration_ids'])->get(['id', 'course_id']);

        if ($registrations->count() !== count($data['registration_ids'])) {
            return response()->json([
                'status' => false,
                'message' => 'Some selected registrations were not found.',
            ], 422);
        }

        $invalidSelection = $registrations->contains(fn ($registration) => (int) $registration->course_id !== (int) $data['course_id']);

        if ($invalidSelection) {
            return response()->json([
                'status' => false,
                'message' => 'Selected registrations must belong to the filtered course only.',
            ], 422);
        }

        DB::transaction(function () use ($data, $batch) {
            Regestration::whereIn('id', $data['registration_ids'])->update([
                'batch_id' => $batch->id,
                'admission_status' => 'admitted',
                'admitted_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return response()->json([
            'status' => true,
            'message' => 'Selected students have been admitted successfully.',
        ]);
    }

    protected function findRegistrationWithRelations($id): Regestration
    {
        return Regestration::with([
            'course',
            'batch',
            'permanentDivision',
            'permanentDistrict',
            'permanentUpazila',
            'presentDivision',
            'presentDistrict',
            'presentUpazila',
        ])->findOrFail($id);
    }








}
