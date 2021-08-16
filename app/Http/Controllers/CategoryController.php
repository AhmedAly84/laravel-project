<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allCat()
    {
        $categories = Category::latest()->paginate(4);
        $trachCat = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index', compact('categories', 'trachCat'));
    }
    public function addCat(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',

        ]);
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();
        return Redirect()->back()->with('success', 'Category has been added successfully');
    }
    public function Edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }
    public function Update(Request $request, $id)
    {
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('category.all')->with('success', 'Category has been updated successfully');
    }
    public function SoftDelet($id)
    {
        $SoftDelete = Category::find($id)->delete();
        return Redirect()->route('category.all')->with('success', 'Category has been trashed successfully');
    }
    public function Restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->route('category.all')->with('success', 'Category has been restored successfully');
    }
    public function Delet($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->route('category.all')->with('success', 'Category has been deleted successfully');
    }
}
