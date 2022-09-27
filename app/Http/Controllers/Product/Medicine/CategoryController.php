<?php

namespace App\Http\Controllers\Product\Medicine;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

use App\Models\Category;

class CategoryController extends Controller
{
    public function create() 
    {
        //view form to create the category
        return view('product.category.add');
    }

    public function store(CategoryRequest $request)
    {
        //save category into database
        Category::create([
            'name_category' => $request->name_category,
        ]);
        return redirect('/category/all');
    }

    public function all()
    {
        $categories = Category::all();
        return view('product.category.all', compact('categories'));
    }

    public function edit($id) 
    {
        //search id category.
        $category = Category::find($id);
        if(!$category)
            return redirect()->back() ;

        $category = Category::select('id', 'name_category')->find($id);
        return view('product.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        //check if category exist.
        $category = Category::find($id);
        if(!$category)
            return redirect() -> back() ;

        //update data.
        $category -> update($request->all());
        return redirect('/category/all');
    }

    public function delete($id) 
    {
        //check if id category exist.
        $category = Category::find($id);
        if(!$category)
            return redirect()->back();

        //delete the category.
        $category  -> delete();
        return redirect()->back();
    }
}
