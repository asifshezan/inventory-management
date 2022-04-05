<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all = Role::where('role_status',1)->orderBy('role_id','DESC')->get();
        return view('admin.role.index', compact('all'));
    }

    public function create(){
        return view('admin.role.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'role_name' => ['required', 'string', 'max:255'],
        ],[
            'role_name.required' => 'Please Enter Role Name',
        ]);

        $slug = Str::slug($request['role_name']);
        $insert = Role::insertGetId([
            'role_name' => $request['role_name'],
            'role_slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Role Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Role Created Failed!');
            return redirect()->back();
        }
    }

    public function edit($slug){
        $data = Role::where('role_status',1)->where('role_slug',$slug)->firstOrfail();
        return view('admin.role.edit', compact('data'));
    }

    public function update(Request $request){
        // return $request->all();
        $id = $request['role_id'];
        $this->validate($request,[
            'role_name' => ['required', 'string', 'max:255'],
        ],[
            'role_name.required' => 'Please Enter Role Name',
        ]);

        $slug = Str::slug($request['role_name']);
        $update = Role::where('role_id',$id)->update([
            'role_name' => $request['role_name'],
            'role_slug' => $slug,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Role update successfully');
            return redirect( route('role.index') );
        } else {
            Session::flash('error', 'Role update Failed!');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Role::where('role_status',1)->where('role_id',$id)->update([
            'role_status' => 0,
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
