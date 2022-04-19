<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = ProductType::where('pt_status',1)->orderBy('pt_id','DESC')->get();
        return view('admin.product.type.index', compact('all'));
    }

    public function create(){
        return view('admin.product.type.create');
    }

    public function store(Request $request){
        $this->middleware($request,[
            'pt_name' => ['required', 'string'],
        ],[
            'pt_name.required' => 'Please enter Type Name.',
        ]);

        $slug = Str::slug($request->pt_name);
        $creator = Auth::user()->id;
        $insert = ProductType::insertGetId([
            'pt_name' => $request['pt_name'],
            'pt_remarks' => $request['pt_remarks'],
            'pt_slug' => $slug,
            'pt_creator' => $creator,
            'pt_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Product Type Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Product Type Created Failed!');
            return redirect()->back();
        }
    }

    public function edit($slug){
        $data = ProductType::where('pt_status',1)->where('pt_slug',$slug)->firstOrFail();
        return view('admin.product.type.edit', compact('data'));
    }

    public function update(Request $request){
        $this->middleware($request,[
            'pt_name' => ['required', 'string'],
        ],[
            'pt_name.required' => 'Please enter Type Name.',
        ]);
        $id = $request['pt_id'];
        $slug = Str::slug($request->pt_name);
        $editor = Auth::user()->id;
        $update = ProductType::where('pt_id',$id)->update([
            'pt_name' => $request['pt_name'],
            'pt_remarks' => $request['pt_remarks'],
            'pt_slug' => $slug,
            'pt_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Product Type Created successfully');
            return redirect( route('product.type.index'));
        } else {
            Session::flash('error', 'Product Type Created Failed!');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = ProductType::where('pt_status',1)->where('pt_id',$id)->update([
            'pt_status' => 0,
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
