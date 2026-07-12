<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        $request = request();
        $query = Category::query();
        // $categories = Category::all();
        $name = $request->query('name');
        $status = $request->query('status');
        if($name){
            $query->where('name','like' , '%' . $name . '%');
        }
        if($status)
            {
                $query->where('status', $status);
            }
        return view('dashboard.pages.categories.index',[
            'categories'=>$query->get(),
        ]);
    }
    public function create()
    {
        $category = new Category();
        return view('dashboard.pages.categories.create', compact('category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Here you would typically save the category to the database
        // Category::create($request->all());
        Category::create($request->all());
        return redirect()->route('dashboard.categories.index')
        ->with('success', 'تمت الاضافة بنجاح  .');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.pages.categories.edit', compact('category'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
     $category = Category::findOrFail($id);
     $category->update($request->all());
     return redirect()->route('dashboard.categories.index')
     ->with('success', 'تم التعديل بنجاح.');
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.pages.categories.show', compact('category'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('dashboard.categories.index')
        ->with('success', 'تم الحذف بنجاح.');
    }
}
