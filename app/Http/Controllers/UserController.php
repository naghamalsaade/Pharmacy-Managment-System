<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use App\Traits\UserJobTrait;

use App\Models\Branch;
use App\Models\Invoice;
use App\Models\ReturnInvoice;
use App\Models\BuyOrder;
use App\Models\BuyBill;

use App\Role;
use App\Permission;
use App\UserJob;
use App\User;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use UserJobTrait;

    /**
     * add new employee
     * 
     */
    public function create() 
    {
        $branches = Branch::all();
        return view('user.add', compact('branches'));
    }

    /**
     * save new employee
     * 
     */
    public function store(UserRequest $request) 
    {
        
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'mobile'=> $request->mobile,
            'password'=> Hash::make($request->password),
        ]);
        
        return redirect('/user/edit/'.$user->id);
    }

    /**
     * show all users (employees)
     * 
     */
    public function all()
    {
        $title = "All Employee";
        $users = User::with('branch')->get();
        return view('user.all', compact('users', 'title'));
    }

    /**
     * show users (employees) in specific branch
     * 
     */
    public function allInBranch() 
    {
        $user = auth()->user();

        $title = "All Employee In Branch";
        $users = User::where('branch_id', $user->branch_id)->with('branch')->get();
        return view('user.all', compact('users', 'title'));
    }

    /**
     * show all inventory users (employees)
     * 
     */
    public function allInventoryEmployee()
    {
        $title = "Inventory Employee List";
        $users = User::where('type', 0)->with('branch')->get();
        return view('user.all', compact('users', 'title'));
    }

    /**
     * show all pharmacy users (employees)
     * 
     */
    public function allPharmacyEmployee()
    {
        $title = "Pharmacy Employee List";
        $users = User::where('type', 1)->with('branch')->get();
        return view('user.all', compact('users', 'title'));
    }

    /**
     * delete user
     * 
     */
    public function delete($id)  
    {
        $user = User::where('id', $id);
        $title = "this user delete user where id  ".$user->id;
        $this->userJob($title);
        $user->delete();
        return back();
    }

    /**
     * edit user
     * 
     */
    public function edit($id)
    {
        $branches = Branch::all();
        $user = User::find($id);
        $permissions = Permission::all();
        $roles = Role::all();
        return view('user.edit', compact('user','permissions','roles', 'branches'));
    }

    /**
     * update user
     * 
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $title = "admin update user where id  ".$user->id;
        $this->userJob($title);
        $user->detachRoles($user->getRoles());
        $user->detachPermissions($user->allPermissions());
        $user->active = $request->radio;
        $user->branch_id = $request->branch;
        $user->name_role = $request->role;


        $user->salary = $request->salary;
        $user->working_hours = $request->working_hours;

        if($request->has('role'))
            $user->attachRole($request->role);

        if($request->has('permissions'))
            $user->attachPermissions($request->permissions);

        $user->save();

        return redirect('/user/all');
    }

    /**
     * show all activities 
     * 
     */
    public function activityList()
    {
        $title = "All Activity";

        $userjobs = UserJob::all();
        return view('user.activity_list', compact('userjobs', 'title'));
    }

    /**
     * show activities in branch
     * 
     */
    public function activityInBranch() 
    {
        $title = "Activity List In Branch";

        $user = auth()->user();

        $userjobs = UserJob::where('user_id', $user->id)->get();
        return view('user.activity_list', compact('userjobs', 'title'));
    }

    /**
     * show activities for specific user
     * 
     */
    public function userActivity($id)
    {
        $user = User::find($id);
        $title = "Activity List For employee ". $user->name;

        $userjobs = UserJob::where('user_id', $id)->get();
        return view('user.activity_list', compact('userjobs', 'title'));
    }

    /**
     * show all orders made by a specific employee
     * 
     */
    public function allOrder($user_id) 
    {
        $user = User::find($user_id);
        $title = "Orders made by employee ". $user->name;

        $buyOrders = BuyOrder::with('user', 'wareHouse')->where('user_id', $user_id)->get();
        return view('inventory.order.all', compact('buyOrders', 'title'));
    }

    /**
     * show all buy bills made by a specific employee
     * 
     */
    public function allBuyBill($user_id) 
    {
        $user = User::find($user_id);
        $title = "Buy Bills made by employee ". $user->name;

        $buyBills = BuyBill::with(['user' => function($query) { $query->select('name', 'id'); }])
        ->with(['buyOrder' => function($query) use($user_id) { $query->where('user_id', $user_id); $query->select('id', 'warehouse_id'); $query->with('wareHouse');}])->get();
    
        return view('inventory.buyBill.all', compact('buyBills', 'title'));
    }

    /**
     * show all invoices made by a specific employee
     * 
     */
    public function allInvoice($user_id)
    {
        $user = User::find($user_id);
        $title = "Invoices made by employee ". $user->name;

        $invoices = Invoice::join('branches', 'invoices.branch_id', '=', 'branches.id')
        ->join('customers', 'invoices.customer_id', '=', 'customers.id')
        ->where('user_id',$user_id)
        ->get();
        
        return view('pharmacy.invoice.all', compact('invoices', 'title'));
    }

    /**
     * show all return invoices made by a specific employee
     * 
     */
    public function allReturnInvoice($user_id)
    {
        $user = User::find($user_id);
        $title = "Return Invoices made by employee ". $user->name;

        $invoices = ReturnInvoice::join('customers', 'return_invoices.customer_id', '=', 'customers.id')
        ->where('user_id',$user_id)
        ->get();

        return view('pharmacy.returnInvoice.all', compact('invoices', 'title'));
    }

    /**
     * logged user show his information
     * 
     */
    public function infoUser()
    {
        return view('user.my_profile');
    }

    /**
     * logged user edit his information
     * 
     */
    public function editUser()
    {
        return view('user.edit_profile');
    }

    /**
     * update information
     * 
     */
    public function updateUser(Request $request)
    {
        if(auth()->guard('web')->user()->id > 0)
        {
            $user = User::find(auth()->guard('web')->user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();
            return back();
        }
    }
}
