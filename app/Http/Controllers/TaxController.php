<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Tax::where('tax_status',1)->orderBy('tax_id','DESC')->get();
        return view('admin.tax.index', compact('all'));
    }

    public function create(){
        return view('admin.tax.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'tax_name' => ['required', 'string'],
            'tax_percent' => ['required', 'integer'],
        ],[
            'tax_name.required' => 'Please enter tax name',
            'tax_percent.required' => 'Please enter tax percent',
        ]);

        $slug = Str::slug($request->tax_name);
        $insert = Tax::insertGetId([
            'tax_name' => $request['tax_name'],
            'tax_percent' => $request['tax_percent'],
            'tax_remarks' => $request['tax_remarks'],
            'tax_slug' => $slug,
            'tax_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Tax Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Tax Created Failed!');
            return redirect()->back();
        }

    }

    public function edit($slug){
        $data = Tax::where('tax_status',1)->where('tax_slug',$slug)->firstOrFail();
        return view('admin.tax.edit', compact('data'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'tax_name' => ['required', 'string'],
            'tax_percent' => ['required', 'integer'],
        ],[
            'tax_name.required' => 'Please enter tax name',
            'tax_percent.required' => 'Please enter tax percent',
        ]);
        $id = $request['tax_id'];
        $slug = Str::slug($request->tax_name);
        $update = Tax::where('tax_id',$id)->update([
            'tax_name' => $request['tax_name'],
            'tax_percent' => $request['tax_percent'],
            'tax_remarks' => $request['tax_remarks'],
            'tax_slug' => $slug,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Tax Updated successfully');
            return redirect( route('tax.index'));
        } else {
            Session::flash('error', 'Tax Updated Failed!');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Tax::where('tax_status',1)->where('tax_id',$id)->update([
            'tax_status' => 0,
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
