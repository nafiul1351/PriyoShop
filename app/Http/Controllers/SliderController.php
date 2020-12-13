<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
class SliderController extends Controller
{
    public function addSlider(){
        $sliders=Slider::all();
        return view('admin.slider.addSlider',compact('sliders'));
    }
    protected function storeSlider(Request $request)
    {
        $this->validate($request, [
                'image' =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $path = '/slider/' .'/image/' . $filename;
            $file->move(public_path() . "/slider/" ."/image/", $filename);
        }
        $slider = Slider::create([
            'image' => $path,
        ]);
        return redirect()->back()->with('success', 'slider add successfully!');
    }
    public function delete(Slider $slider){
        $slider->delete();
        return redirect()->back()->with('success', 'slider Delete successfully!');
    }
}
