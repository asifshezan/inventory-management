<?php

namespace App\Http\Controllers;

use App\Models\PurchaseUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PurchaseUnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = PurchaseUnit::where('pu_status',1)->orderBy('pu_id','DESC')->get();
        return view('admin.purchase-unit.index', compact('all'));
    }

    public function create(){
        return view('admin.purchase-unit.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'pu_name' => ['required', 'string', 'max:255'],
        ],[
            'pu_name.required' => "Enter Your Name",
        ]);

        $insert = PurchaseUnit::insertGetId([
            'pu_name' => $request->pu_name,
            'pu_remarks' => $request->pu_remarks,
            'pu_slug' => Str::slug($request->pu_name, '-'),
            'pu_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Purchase Unit Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Purchase Unit Created Failed!');
            return redirect()->back();
        }
    }

    public function edit($slug){
        $data = PurchaseUnit::where('pu_status',1)->where('pu_slug',$slug)->firstOrFail();
        return view('admin.purchase-unit.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'pu_name' => ['required', 'string', 'max:255'],
        ],[
            'pu_name.required' => "Enter Your Name",
        ]);
        $id = $request['pu_id'];
        $update = PurchaseUnit::where('pu_id',$id)->update([
            'pu_name' => $request->pu_name,
            'pu_remarks' => $request->pu_remarks,
            'pu_slug' => Str::slug($request->pu_name, '-'),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Purchase Unit Created successfully');
            return redirect( route('purchase.unit.index'));
        } else {
            Session::flash('error', 'Purchase Unit Created Failed!');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = PurchaseUnit::where('pu_id',$id)->where('pu_status',1)->update([
            'pu_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($soft) {
            Session::flash('success', 'Purchase Unit Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Purchase Unit Created Failed!');
            return redirect()->back();
        }
    }
}
