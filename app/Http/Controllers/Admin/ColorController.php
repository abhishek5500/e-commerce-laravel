<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\ColorFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Colors;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Colors::all();
        return view('admin.color.index', compact('colors'));
    }
    public function create()
    {
        return view('admin.color.create');
    }
    public function store(ColorFormRequest $request)

    {

        $validatedData = $request->validated();
        Colors::create($validatedData);
        return redirect('admin/colors')->with('message', 'Colors added successfully');
    }
    public function edit(Colors $color)
    {

        return view('admin.color.edit', compact('color'));
    }
    public function update(ColorFormRequest $request, $color_id)

    {

        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? "1":"0";
        Colors::find($color_id)->update($validatedData);
        return redirect('admin/colors')->with('message', 'Colors Updated successfully');
    }
    public function destroy($color_id)
    {

        $color = Colors::find($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message', 'Colors Deleted successfully');
    }
}
