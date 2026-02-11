<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function index()
        {
            try {
                $partners = Partner::orderBy('order', 'asc')->paginate(15);
                return view('backend.pages.partner.index', compact('partners'));

            } catch (\Exception $e) {
                \Log::error('Partner index fetch error: '.$e->getMessage());
                $partners = collect(); // empty collection
                return view('backend.partner.index', compact('partners'));
            }
        }

    public function store(Request $request)
    {

        $request->validate([
            'logo' => 'required|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'status' => 'required|in:0,1',
        ]);
        try {
            $path = $request->hasFile('logo')
                ? $this->uploadImage($request, 'logo', 'uploads/partners')
                : 'uploads/partners/default-partner.png';
            $lastOrder = Partner::max('order') ?? 0;
            $order = $lastOrder + 1;
            Partner::create([
                'logo' => $path,
                'status' => $request->status,
                'order' => $order,
            ]);

            return redirect()->back()->with('success', 'Partner added successfully!');

        } catch (\Exception $e) {
            \Log::error('Partner store error: '.$e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while adding partner.');
        }
    }

    public function destroy($id)
    {
        $user = Partner::findOrFail($id);
        if ($user->photo) {
            if(!$user->photo == 'dummy/user/user.png')
            {
                $this->deleteExistingImage($user->photo);
            }
        }
        $data = $user->delete();
        return response()->json([
            'data'=>$data,
            'success' => 'User deleted successfully!'
        ]);

    }

}
