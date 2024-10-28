<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function index()
    {   
        $categories = CategoryModel::whereNull('is_delete')->get();
        return view('pages.category-list',['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'status' => 'required|integer',
        ]);
    
        // Check if a category with the same name already exists
        $existingCategory = CategoryModel::where('category_name', $request->category_name)->whereNull('is_delete')->first();
        
        if ($existingCategory) {
            return redirect()->route('categories.index')->with('error', 'Category name already exists.');
        }
    
        CategoryModel::create($request->all());
        
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }
    

    public function edit(Request $request,$category)
    {   
        $request->validate([
            'category_name' =>'required|string|max:255',
            'status' =>'required|integer',
        ]);
        $category = CategoryModel::find($category);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy($category)
    {
        $category = CategoryModel::find($category);
        $category->is_delete = true;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
