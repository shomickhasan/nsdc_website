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
            $data['photo'] = $request->hasFile('photo')
                ? $this->uploadImage($request, 'photo', 'uploads/registrations/photos')
                : 'uploads/registrations/photos/default-photo.png';

            $data['signature'] = $request->hasFile('signature')
                ? $this->uploadImage($request, 'signature', 'uploads/registrations/signatures')
                : 'uploads/registrations/signatures/default-signature.png';
            $registration =  Regestration::create($data);

            RegistrationPDFEmailJob::dispatch($registration->id, $registration->email);
            return redirect()->back()->with('message', 'Registration submitted successfully!');

        } catch (\Exception $e) {
            \Log::error('Registration Save Error: '.$e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Something went wrong while submitting the registration. Please try again.');
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
