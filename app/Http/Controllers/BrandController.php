<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultiPic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllBrand()
    {
        $Brands = Brand::latest()->paginate(3);
        return view('admin.brand.index', compact('Brands'));
    }
    public function addBrand(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png'

        ]);
        // $brand_image = $request->file('brand_image');
        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen . '.' . $img_ext;
        // $up_location = 'image/brand/';
        // $last_img = $up_location . $img_name;
        // $brand_image->move($up_location, $img_name);

        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . "." . $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $name_gen);
        $last_img = 'image/brand/' . $name_gen;
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);


        return Redirect()->back()->with('success', 'Brand has been added successfully');
    }
    public function Edit($id)
    {

        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }
    public function Update($id, Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|min:4',

        ]);
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location . $img_name;
            $brand_image->move($up_location, $img_name);

            unlink($old_image);
            Brand::find($id)->Update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        } else {
            Brand::find($id)->Update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
        }



        return Redirect()->route('brand.all')->with('success', 'Brand has been updated successfully');
    }
    public function Delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);
        Brand::find($id)->delete();
        return Redirect()->route('brand.all')->with('success', 'Brand has been deleted successfully');
    }
    //For muli images
    public function MultiPic()
    {
        $images = MultiPic::get();
        return view('admin.multipic.index', compact('images'));
    }
    public function AddImages(Request $request)
    {
        // $validatedData = $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,png'

        // ]);


        $muli_image = $request->file('image');
        foreach ($muli_image as $img) {


            $name_gen = hexdec(uniqid()) . "." .  $img->getClientOriginalExtension();
            Image::make($img)->resize(300, 200)->save('image/multi/' . $name_gen);
            $last_img = 'image/multi/' . $name_gen;
            MultiPic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        }
        return Redirect()->back();
    }
    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login')->with('sucsess', 'You are logout sucsessfuly');
    }
}
