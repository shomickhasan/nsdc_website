<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    //------------------------
    //HERO SECTION SLIDER
    //------------------------


    public function Slider_create(){
        return view('backend.content.hero_slider.create');
    }

    public function Slider_index()
    {

        $sliders = Slider::orderBy('order', 'asc')
        ->paginate(10);
        return view('backend.content.hero_slider.index', compact('sliders'));
    }

    public function Slider_store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button1_text' => 'required|string|max:50',
            'button1_link' => 'required|max:255',
            'button2_text' => 'required|string|max:50',
            'button2_link' => 'required|max:255',
            'status' => 'required|boolean',
            'image' => 'required|mimes:jpg,jpeg,png,webp,avif|max:2048',
        ]);
        $validatedData['image'] = $request->hasFile('image')
            ? $this->uploadImage($request, 'image', 'uploads/sliders')
            : 'uploads/sliders/default-slider.png';

        $maxOrder = Slider::max('order') ?? 0;
        $validatedData['order'] = $maxOrder + 1;

        Slider::create($validatedData);
        return redirect()->route('hero_slider.index')
            ->with('success', 'Hero Slider Created Successfully.');
    }

    public function Slider_orderUpdate(Request $request)
    {
        $orderData = $request->input('order');

        if (!empty($orderData)) {
            foreach ($orderData as $item) {
                Slider::where('id', $item['id'])->update(['order' => $item['position']]);
            }
            return response()->json(['status' => 'success', 'message' => 'Order updated successfully']);
        }

        return response()->json(['status' => 'error', 'message' => 'No data received']);
    }


    public function Slider_edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.content.hero_slider.edit', compact('slider'));
    }

    public function Slider_update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        // 1️⃣ Validation
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button1_text' => 'required|string|max:50',
            'button1_link' => 'required|url|max:255',
            'button2_text' => 'required|string|max:50',
            'button2_link' => 'required|url|max:255',
            'status' => 'required|boolean',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        if ($request->hasFile('image')) {
            // Delete old image if exists
            if($slider->image && file_exists(public_path('storage/'.$slider->image))){
                unlink(public_path('storage/'.$slider->image));
            }

            $validatedData['image'] = $this->uploadImage($request, 'image', 'uploads/sliders');
        }
        $slider->update($validatedData);

        return redirect()->route('hero_slider.index')
            ->with('success', 'Hero Slider Updated Successfully.');
    }



}
