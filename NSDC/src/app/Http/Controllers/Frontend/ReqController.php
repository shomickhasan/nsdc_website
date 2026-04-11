<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\RegReq;
use App\Jobs\RegistrationPDFEmailJob;
use App\Models\Backend\Regestration;
use Illuminate\Http\Request;

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

        $filters = $request->only(['name', 'from_date', 'to_date']);
        $registrations = Regestration::with('course')
            ->filter($filters)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        if ($request->ajax()) {
            return view('backend.pages.reg.partial', compact('registrations'))->render();
        }

        return view('backend.pages.reg.index', compact('registrations', 'filters'));
    }








}
