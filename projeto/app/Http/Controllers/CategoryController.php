<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Task; 

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(int $id)
    {
        $category = Category::find($id); 

        return view('categories.show', [
            'category' => $category 
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',

        ]);

        Category::create($request->only('title')); 

        return redirect('/categories');
    }

    public function edit(int $id)
    {
        $category = Category::find($id);

        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(int $id, Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
        ]);
        
        $category = Category::find($id);

        $category->update([
            'title' => $request->title,
        ]);
        

        return redirect('/categories');
    }

    public function destroy(int $id)
    {
        $category = Category::find($id);


        $category->tasks()->delete(); 
        

        $category->delete();
        
        return redirect('/categories');
    }
}