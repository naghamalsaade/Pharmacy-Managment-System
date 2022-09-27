<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Traits\UserJobTrait;

use App\Models\Branch;
use App\Models\Location;
use App\User;

class BranchController extends Controller
{
    use UserJobTrait;

    /**
     * add branch
     * 
     */
    public function create()  
    {
        $locations = Location::all();
        return view('branch.add', compact('locations'));
    }

    /**
     * save branch
     * 
     */
    public function store(Request $request)
    {
        $branch = new Branch;
        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->location_id = $request->Location;
        $branch->type = $request->type;
        $branch->active = $request->active;
        $branch->save();
        $title = "admin add branch".$request->name."where id  ".$branch->id;
        $this->userJob($title);

        return redirect('/branch/all');
    }

    /**
     * show all branches (inventories and pharmacies)
     * 
     */
    public function all()  
    {
        $title = "All Branch";
        $branches = Branch::all();
        return view('branch.all', compact('branches', 'title'));
    }

    /**
     * delete branch
     * 
     */
    public function delete($id) 
    {
        $branch = Branch::find($id);
        $title = "admin delete branch".$branch->name."where id  ".$branch->id;
        $this->userJob($title);
        $branch->delete();
        return back();
    }

    /**
     * edit branch
     * 
     */
    public function edit($id)  
    {
        $branch = Branch::find($id);
        $locations = Location::all();
        return view('branch.edit', compact('branch','locations'));
    }

    /**
     * update branch
     * 
     */
    public function update($id, Request $request)
    {
        $branch = Branch::find($id);
        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->location_id = $request->Location;
        $branch->type = $request->type;
        $branch->active = $request->active;
        $branch->save();
        $title = "admin update branch".$branch->name."where id  ".$branch->id;
        $this->userJob($title);
        return redirect('/branch/all');
    }

    /**
     * show all employees in specific branch
     * 
     */
    public function allEmployee($branch_id)  
    {
        $branch = Branch::find($branch_id);
        $title = "All Employee In Brnach : ".$branch->name;

        $users = User::where('branch_id', $branch_id)->get();
        return view('user.all', compact('users', 'title'));
    }
}
