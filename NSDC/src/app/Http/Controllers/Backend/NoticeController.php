<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('backend.pages.notice.index', compact('notices'));
    }

    public function create()
    {
        return view('backend.pages.notice.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'published_at' => 'required|date',
            'pdf_file' => 'required|file|mimes:pdf|max:10240',
        ]);

        $data['pdf_file'] = $request->file('pdf_file')->store('uploads/notices', 'public');

        Notice::create($data);

        return redirect()->route('notice.index')->with('message', 'Notice uploaded successfully!');
    }

    public function destroy(Notice $notice)
    {
        if ($notice->pdf_file && Storage::disk('public')->exists($notice->pdf_file)) {
            Storage::disk('public')->delete($notice->pdf_file);
        }

        $notice->delete();

        return redirect()->route('notice.index')->with('message', 'Notice deleted successfully!');
    }
}
