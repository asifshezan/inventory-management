<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all = Department::where('department_status',1)->orderBy('department_id','DESC')->get();
        return view('admin.department.index', compact('all'));
    }

    public function create(){
        return view('admin.department.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'department_name' => ['required', 'string', 'max:255'],
        ],[
            'department_name.required' => 'Please Enter department Name',
        ]);

        $slug = Str::slug($request['department_name']);
        $insert = Department::insertGetId([
            'department_name' => $request['department_name'],
            'department_remarks' => $request['department_remarks'],
            'department_status' => 1,
            'department_slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'department Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'department Created Failed!');
            return redirect()->back();
        }
    }

    public function edit($slug){
        $data = department::where('department_status',1)->where('department_slug',$slug)->firstOrfail();
        return view('admin.department.edit', compact('data'));
    }

    public function update(Request $request){
        // return $request->all();
        $id = $request['department_id'];
        $this->validate($request,[
            'department_name' => ['required', 'string', 'max:255'],
        ],[
            'department_name.required' => 'Please Enter department Name',
        ]);

        $slug = Str::slug($request['department_name']);
        $update =Department::where('department_id',$id)->update([
            'department_name' => $request['department_name'],
            'department_remarks' => $request['department_remarks'],
            'department_slug' => $slug,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'department update successfully');
            return redirect( route('department.index') );
        } else {
            Session::flash('error', 'department update Failed!');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Department::where('department_status',1)->where('department_id',$id)->update([
            'department_status' => 0,
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
