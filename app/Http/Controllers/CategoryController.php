<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all()
    {
        $categories = Category::all();
        return view('sellers.category.index', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        if (isset($request->parent_category_id) && $request->parent_category_id != null) {
            $category = Category::create([
                'name' => $request->name,
                'parent_category_id' => $request->parent_category_id,
            ]);
        } else {
            $category = Category::create([
                'name' => $request->name,
            ]);
        }
        return redirect()->back()->with('success','Category Added Successfully');
    }

    public function editCategory(Category $category)
    {
        $categories = Category::all();
        return view('sellers.category.edit', compact('category','categories'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        if (isset($request->parent_category_id) && $request->parent_category_id != null) {
            $category->name = $request->name;
            $category->parent_category_id = $request->parent_category_id;
            $category->save();
        } else {
            $category->name = $request->name;
            $category->save();
        }
        return redirect()->route('category.all')->with('success','Category Updated Successfully');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
