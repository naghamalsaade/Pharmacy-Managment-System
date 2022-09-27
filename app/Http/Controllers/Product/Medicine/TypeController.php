<?php

namespace App\Http\Controllers\Product\Medicine;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;

use App\Models\Type;

class TypeController extends Controller
{
    public function create() 
    {
        //view form to add the type.
        return view('product.type.add');
    }

    public function store(TypeRequest $request)
    {
        //save type into database.
        Type::create([
            'name_type'=> $request->name_type,
        ]);
        return redirect('/type/all');
    }

    public function all()
    {
        $types = Type::all();

        return view('product.type.all', compact('types'));
    }

    public function edit($id)
    {
        //search id type.
        $type = Type::find($id);
        if(!$type)
            return redirect()->back() ;

        $type = Type::select('id', 'name_type')->find($id);
        return view('product.type.edit', compact('type'));
    }

    public function update(TypeRequest $request, $id)
    {
        //check if Type exist.
        $type = Type::find($id);
        if(!$type)
            return redirect() -> back() ;

        //update data.
        $type -> update($request->all());
        return redirect('/type/all');
    }

    public function delete($id)
    {
        //check if id Type exist.
        $type = Type::find($id);
        if(!$type)
            return redirect()->back();

        //delete the type.
        $type -> delete();
        return redirect()->back();

    }
}
