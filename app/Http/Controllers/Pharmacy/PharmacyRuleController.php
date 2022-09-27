<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\PharmacyRule;

class PharmacyRuleController extends Controller
{
    /**
     * add rule
     * 
     */
    public function create()
    {
        return view('dashboard.pharmacyRule.add');
    }

    /**
     * save rule
     * 
     */
    public function store(Request $request)  
    {
        $pharmacyrules = new PharmacyRule;
        $pharmacyrules->min_amount_inventory = $request->min_amount_inventory;
        $pharmacyrules->min_amount_pharmacy = $request->min_amount_pharmacy;
        $pharmacyrules->Longest_replay_time = $request->Longest_replay_time;
        $pharmacyrules->The_biggest_loan = $request->The_biggest_loan;
        $pharmacyrules->save();
        return redirect('/pharmacy_rule/all');
    }

    /**
     * show all rules
     * 
     */
    public function all()
    {
        $pharmacyrules = PharmacyRule::all();
        return view('dashboard.pharmacyRule.all', compact('pharmacyrules'));
    } 

    /**
     * delete rule
     * 
     */
    public function delete($id) 
    {
        $pharmacyrules = PharmacyRule::where('id', $id);
        $pharmacyrules->delete();
        return back();
    }

    /**
     * edite rule
     * 
     */
    public function edit($id) 
    {
        $pharmacyrules = PharmacyRule::find($id);
        return view('dashboard.pharmacyRule.edit', compact('pharmacyrules'));
    }

    /**
     * update rule
     * 
     */
    public function update($id, Request $request) 
    {
        $pharmacyrules = PharmacyRule::find($id);
        $pharmacyrules->min_amount_inventory = $request->min_amount_inventory;
        $pharmacyrules->min_amount_pharmacy = $request->min_amount_pharmacy;
        $pharmacyrules->Longest_replay_time = $request->Longest_replay_time;
        $pharmacyrules->The_biggest_loan = $request->The_biggest_loan;
        $pharmacyrules->save();
        return back();
    }
}
