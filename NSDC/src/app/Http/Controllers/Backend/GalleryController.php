<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('backend.pages.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.pages.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        if ($request->type === Gallery::TYPE_PICTURE) {
            $data['image'] = $request->file('image')->store('uploads/gallery', 'public');
            $data['youtube_url'] = null;
        }

        if ($request->type === Gallery::TYPE_VIDEO) {
            $data['image'] = null;
        }

        $data['order'] = (Gallery::max('order') ?? 0) + 1;
        Gallery::create($data);

        return redirect()->route('gallery.index')->with('message', 'Gallery content added successfully!');
    }

    public function edit(Gallery $gallery)
    {
        return view('backend.pages.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $this->validatedData($request, $gallery);

        if ($request->type === Gallery::TYPE_PICTURE) {
            if ($request->hasFile('image')) {
                if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                    Storage::disk('public')->delete($gallery->image);
                }
                $data['image'] = $request->file('image')->store('uploads/gallery', 'public');
            }
            $data['youtube_url'] = null;
        }

        if ($request->type === Gallery::TYPE_VIDEO) {
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = null;
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')->with('message', 'Gallery content updated successfully!');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')->with('message', 'Gallery content deleted successfully!');
    }

    private function validatedData(Request $request, ?Gallery $gallery = null): array
    {
        $imageRule = 'nullable';

        if (!$gallery && $request->type === Gallery::TYPE_PICTURE) {
            $imageRule = 'required';
        }

        if ($gallery && $request->type === Gallery::TYPE_PICTURE && !$gallery->image) {
            $imageRule = 'required';
        }

        return $request->validate([
            'type' => 'required|in:picture,video',
            'title' => 'required|string|max:255',
            'image' => $imageRule . '|image|mimes:jpg,jpeg,png,webp|max:4096',
            'youtube_url' => 'nullable|required_if:type,video|url|max:255',
            'status' => 'required|in:0,1',
        ]);
    }
}
