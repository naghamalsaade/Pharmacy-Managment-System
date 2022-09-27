<?php

namespace App\Http\Controllers\Product\Medicine;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgeGroupRequest;

use App\Models\AgeGroup;

class AgeGroupController extends Controller
{
    public function create() 
    {
        //view form to create the age group
        return view('product.ageGroup.add');
    }

    public function store(AgeGroupRequest  $request)
    {
        //save age group into database
        AgeGroup::create([
            'name_age_group'=> $request->name_age_group,
        ]);
        return redirect('age-group/all');
    }

    public function all()
    {
        $agegroups = AgeGroup::all();
        return view('product.ageGroup.all', compact('agegroups'));

    }

    public function edit($id) 
    {
        //search id age group.
        $ageGroup = AgeGroup::find($id);
        if(!$ageGroup)
            return redirect()->back() ;

        $ageGroup = AgeGroup::select('id', 'name_age_group')->find($id);
        return view('product.ageGroup.edit', compact('ageGroup'));
    }

    public function update(AgeGroupRequest $request, $id)
    {
        //check if ageGroup exist.
        $ageGroup = AgeGroup::find($id);
        if(!$ageGroup)
            return redirect() -> back() ;

        //update data.
        $ageGroup -> update($request->all());
        return redirect('age-group/all');
    }

    public function delete($id)
    {
        //check if id age group exist.
        $ageGroup = AgeGroup::find($id);
        if(!$ageGroup)
            return redirect()->back();

        //delete the age group.
        $ageGroup -> delete();
        return redirect()->back();
    }
}
