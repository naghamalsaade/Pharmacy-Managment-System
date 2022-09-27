<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Traits\UserJobTrait;

use App\Models\Location;

class LocationController extends Controller
{
    use UserJobTrait;

    /**
     * add location
     * 
     */
    public function create()  
    {
        return view('branch.location.add');
    }

    /**
     * save location
     * 
     */
    public function store(Request $request)
    {
        $location = new Location;
        $location->country = $request->country;
        $location->city = $request->city;
        $location->street = $request->street;
        $location->save();
        $title = "admin add location where id  ".$location->id;
        $this->userJob($title);
        return redirect('location/all');
    }

    /**
     * show all locations
     * 
     */
    public function all() 
    {
        $locations = Location::all();
        return view('branch.location.all', compact('locations'));
    }

    /**
     * delete location
     * 
     */
    public function delete($id)
    {
        $locations = Location::find($id);
        $title = "admin delete location where id  ".$locations->id;
        $this->userJob($title);
        $locations->delete();
        return back();
    }

    /**
     * edit location
     * 
     */
    public function edit($id) 
    {
        $location = Location::find($id);
        return view('branch.location.edit', compact('location'));
    }

    /**
     * update location
     * 
     */
    public function update($id,Request $request)
    {
        $locations = Location::find($id);
        $locations->country = $request->country;
        $locations->city = $request->city;
        $locations->street = $request->street;
        $locations->save();
       $title = "admin update location where id  ".$locations->id;
       $this->userJob($title);
       
       return redirect('/location/all');
    }
}
