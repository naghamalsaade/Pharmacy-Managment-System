<?php

namespace App\Http\Controllers\Product\Medicine;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\EffectiveMaterial;

class EffectiveMaterialController extends Controller
{
    public function create() 
    {
        //view form to creat the effectiveMaterial.
        return view('product.effectiveMaterial.add');
    }

    public function store(Request $request)
    {
        //save effectiveMaterial into database.
        EffectiveMaterial::create([
            'name'=> $request->name,
        ]);
        return redirect('effective-material/all');
    }

    public function all()
    {
        $effectiveMaterials = EffectiveMaterial::select('id', 'name')->get();
        return view('product.effectiveMaterial.all', compact('effectiveMaterials'));
    }

    public function edit($id)
    {
        //search id type.
        $product = EffectiveMaterial::find($id);
        if(!$product)
            return redirect()->back() ;

        $effectiveMaterial = EffectiveMaterial::select('id', 'name')->find($id);
        return view('product.effectiveMaterial.edit', compact('effectiveMaterial'));
    }

    public function update(Request $request, $id)
    {
        //check if effectiveMaterial exist.
        $effectiveMaterial = EffectiveMaterial::find($id);
        if(!$effectiveMaterial)
            return redirect() -> back() ;

        //update data.
        $effectiveMaterial -> update($request->all());
        return redirect('effective-material/all');
    }

    public function delete($id) 
    {
        //check if id effectiveMaterial exist.
        $effectiveMaterial = EffectiveMaterial::find($id);
        if(!$effectiveMaterial)
            return redirect()->back();

        //delete the effectiveMaterial.
        $effectiveMaterial -> delete();
        return redirect()->back();
    }
}
