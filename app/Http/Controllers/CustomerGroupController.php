<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerGroup;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CustomerGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = CustomerGroup::where('cg_status',1)->orderBy('cg_id','DESC')->get();
        return view('admin.customer-group.index', compact('all'));
    }

    public function create(){
        return view('admin.customer-group.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'cg_name' => ['required', 'string', 'max:255'],
        ],[
            'cg_name.required' => 'Please Enter customer-group name.',
        ]);

        $slug = Str::slug($request->cg_name);
        $insert = CustomerGroup::insertGetId([
            'cg_name' => $request['cg_name'],
            'cg_remarks' => $request['cg_remarks'],
            'cg_slug' => $slug,
            'cg_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Succesffuly insert customer-group name');
            return redirect()->back();
        }else{
            Session::flash('error','Opps! Failed insert.');
            return redirect()->back();
        }
    }

    public function edit($slug){
        $data = CustomerGroup::where('cg_status',1)->where('cg_slug',$slug)->firstOrFail();
        return view('admin.customer-group.edit', compact('data'));
    }

    public function update(Request $request){
        // return $request->all();
        $id = $request['cg_id'];
        $this->validate($request,[
            'cg_name' => ['required', 'string', 'max:255'],
        ],[
            'cg_name.required' => 'Please Enter Role Name',
        ]);

        $slug = Str::slug($request['cg_name']);
        $update = CustomerGroup::where('cg_id',$id)->update([
            'cg_name' => $request['cg_name'],
            'cg_remarks' => $request['cg_remarks'],
            'cg_slug' => $slug,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Role update successfully');
            return redirect( route('cg.index') );
        } else {
            Session::flash('error', 'Role update Failed!');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = CustomerGroup::where('cg_status',1)->where('cg_id',$id)->update([
            'cg_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success','Successfully delete.');
            return redirect()->back();
        }else{
            Session::flash('error','Opps! Failed to delete.');
            return redirect()->back();
        }
    }
}
