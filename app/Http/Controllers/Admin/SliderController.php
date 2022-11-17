<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = 'uploads/slider/'.$filename;
            $validatedData['status'] = $request->status == true ? '1':'0';
         }


        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        
        ]);
        return redirect('/admin/sliders')->with('message', 'Slider Added Successfully');
    }
    public function edit(Slider $slider)
    {
      return view('admin.slider.edit', compact('slider'));
    }
    public function update(SliderFormRequest $request, $slider)
    {

        $validatedData = $request->validated();
        $slider = Slider::findOrFail($slider);
        $slider->title = $validatedData['title']; 
       
        $slider->description = $validatedData['description'];
        if ($request->hasFile('image')) {

            $path = 'uploads/slider/'.$slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }
           $file = $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $filename= time().'.'.$ext;
           $file->move('uploads/slider/', $filename);
           $slider->image = 'uploads/slider/'.$filename;

        }
    
        $slider->status = $request->status == true?'1': '0';
        $slider->save();

        return redirect("admin/sliders")->with('message','Slider Updated successfully');

    }
    public function destroy(int $slider_id)
    {
        $slider = Slider::findOrFail($slider_id);
        $slider->delete();
        return redirect('/admin/sliders')->with('message', 'Slider Deleted Successfully');
    }
}
