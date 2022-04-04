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
        $all = Customer::where('customer_status',1)->orderBy('customer_id','ASC')->get();
        return view('admin.customer.index', compact('all'));
    }

    public function create(){
        return view('admin.customer.create');
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
}
