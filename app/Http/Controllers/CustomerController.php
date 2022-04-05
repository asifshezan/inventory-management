<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;



class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Customer::where('customer_status',1)->orderBy('customer_id','DESC')->get();
        return view('admin.customer.index', compact('all'));
    }

    public function create(){
        return view('admin.customer.create');
    }

    public function edit($slug){
        $data = Customer::where('customer_status',1)->where('customer_slug',$slug)->firstOrFail();
        return view('admin.customer.edit', compact('data'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:20'],
            'customer_email' => ['required', 'string','email', 'max:255'],
        ],[
            'customer_name.required' => 'Please enter name',
            'customer_phone.required' => 'Please enter phone number',
            'customer_email.required' => 'Please enter email',
        ]);

        $slug = 'C' . uniqid();
        $creator = Auth::user()->id;
        $insert = Customer::insertGetId([
            'cg_id' => $request['cg_id'],
            'customer_name' => $request['customer_name'],
            'customer_phone' => $request['customer_phone'],
            'customer_email' => $request['customer_email'],
            'customer_company' => $request['customer_company'],
            'customer_address' => $request['customer_address'],
            'customer_city' => $request['customer_city'],
            'customer_state' => $request['customer_state'],
            'customer_postal' => $request['customer_postal'],
            'customer_country' => $request['customer_country'],
            'customer_remarks' => $request['customer_remarks'],
            'customer_slug' => $slug,
            'customer_creator' => $creator,
            'customer_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Succesfully create customer');
            return redirect()->back();
        }else{
            Session::flash('error','Opps!failed to create customer.');
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $id = $request->customer_id;
        $this->validate($request,[
            // 'cg_id' => ['required', 'integer', 'max:255'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_company' => ['required', 'string', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:20'],
            'customer_address' => ['required', 'string', 'max:255'],
            // 'customer_remarks' => ['required', 'string', 'max:255'],
        ],[
            // 'cg_id.required' =>  'Enter Group Name',
            'customer_name.required' =>  'Enter  Customer Name',
            'customer_phone.required' =>  'Enter Phone',
            'customer_address.required' =>  'Enter Address',
            'customer_company.required' =>  'Enter Company Name',
            // 'customer_remarks.required' =>  'Enter Remarks'
        ]);

        $editor = Auth::user()->id;
        $update = Customer::where('customer_status',1)->where('customer_id', $id)->update([
            // 'cg_id' => $request->cg_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_company' => $request->customer_company,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'customer_city' => $request->customer_city,
            'customer_state' => $request->customer_state,
            'customer_postal' => $request->customer_postal,
            'customer_country' => $request->customer_country,
            'customer_remarks' => $request->customer_remarks,
            'customer_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($update) {
            Session::flash('success', 'Customer Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Customer Updated Failed!');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Customer::where('customer_status',1)->where('customer_id',$id)->update([
            'customer_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($soft){
            Session::flash('success','Successfully Delete.');
            return redirect()->back();
        }else{
            Session::flash('error','Opps!Failed to delete.');
            return redirect()->back();
        }
    }
}
