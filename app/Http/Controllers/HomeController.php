<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;
class HomeController extends Controller
{
    //slider
    public function AllSlider()
    {
        $sliders = Slider::get();
        return view('admin.slider.index',compact('sliders'));
    }
    public function NewSlider()
    {

        return view('admin.slider.add_slider');
    }
    public function AddSlider(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'min:4',
            'discription' => 'min:10',
            'image' => 'mimes:jpg,jpeg,png'

        ]);


        $slider_image = $request->file('image');
        $name_gen = hexdec(uniqid()) . "." . $slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(800, 600)->save('image/slider/' . $name_gen);
        $last_img = 'image/slider/' . $name_gen;
        Slider::insert([
            'title' => $request->title,
            'discription' => $request->discription,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);


        return Redirect()->route('home.slider')->with('success', 'Slider has been added successfully');

    }
    public function Edit($id)
    {

        $sliders = Slider::find($id);
        return view('admin.slider.edit_slider', compact('sliders'));
    }
    public function Update($id, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'min:4',
            'discription' => 'min:10',
            'image' => 'mimes:jpg,jpeg,png'

        ]);
        $old_image = $request->old_image;
        $slider_image = $request->file('image');
        if ($slider_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/slider/';
            $last_img = $up_location . $img_name;
            $slider_image->move($up_location, $img_name);

            unlink($old_image);
            Slider::find($id)->Update([
                'title' => $request->title,
                'discription' => $request->discription,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        } else {
            Slider::find($id)->Update([
                'title' => $request->title,
                'discription' => $request->discription,
                'created_at' => Carbon::now()
            ]);
        }



        return Redirect()->route('home.slider')->with('success', 'Slider has been updated successfully');
    }
    public function Delete($id)
    {
        $slider = Slider::find($id);
        $old_image = $slider->image;
        unlink($old_image);
        Slider::find($id)->delete();
        return Redirect()->route('home.slider')->with('success', 'Slider has been deleted successfully');
    }

    // About Functions
    public function About()
    {
        $about = About::all();
        return view('admin.about.index',compact('about'));
    }
    public function NewAbout()
    {

        return view('admin.about.add_data');
    }
    public function AddData(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:80',
            'short_desc' => 'required|max:150',
            'description' => 'required',
        ]);
        $about = new About();
        $about->title = $request->title;
        $about->short_desc = $request->short_desc;
        $about->description = $request->description;

        $about->save();
        return Redirect()->route('home.about')->with('success', 'Data has been added successfully');
    }
    public function EditAbout($id)
    {

        $about = About::find($id);
        return view('admin.about.edit_about', compact('about'));
    }
    public function UpdateAbout(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'max:80',
            'short_disc' => 'max:150',

        ]);
        $update = About::find($id)->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'description' => $request->description

        ]);
        return Redirect()->route('home.about')->with('success', 'Data has been updated successfully');
    }
    public function DeleteAbout($id)
    {

        About::find($id)->delete();
        return Redirect()->route('home.about')->with('success', 'Data has been deleted successfully');
    }

}
