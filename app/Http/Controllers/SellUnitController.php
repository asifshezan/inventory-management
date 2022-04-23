<?php

namespace App\Http\Controllers;

use App\Models\SellUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class SellUnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = SellUnit::where('su_status',1)->orderBy('su_id','DESC')->get();
        return view('admin.sell_unit.index', compact('all'));
    }

    public function create(){
        return view('admin.sell_unit.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'su_name' => ['required', 'string', 'max:255'],
            'su_remarks' => ['required', 'string'],
            'pu_id' => ['required', 'integer'],
        ],[
            'su_name.required' => "Enter Your Name",
            'su_remarks.required' => "Enter Your remarks",
            'pu_id.required' => "Enter Your Purchase Unit",
        ]);

        $insert = SellUnit::insertGetId([
            'su_name' => $request->su_name,
            'su_remarks' => $request->su_remarks,
            'pu_id' => $request['pu_id'],
            'su_slug' => Str::slug($request->su_name, '-'),
            'su_status' => 1,
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
        $data = SellUnit::where('su_status',1)->where('su_slug',$slug)->firstOrFail();
        return view('admin.sell_unit.edit', compact('data'));
    }

    public function update(Request $request)
    {
        // return($request->all());
        $this->validate($request,[
            'su_name' => ['required', 'string', 'max:255'],
            'su_remarks' => ['required', 'string'],
            'pu_id' => ['required', 'integer'],
        ],[
            'su_name.required' => "Enter Your Name",
            'su_remarks.required' => "Enter Your remarks",
            'pu_id.required' => "Enter Your Purchase Unit",
        ]);

        $id = $request['su_id'];
        $update = SellUnit::where('su_id',$id)->update([
            'su_name' => $request->su_name,
            'su_remarks' => $request->su_remarks,
            'pu_id' => $request['pu_id'],
            'su_slug' => Str::slug($request->su_name, '-'),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Sell Unit Created successfully');
            return redirect( route('sell.unit.index'));
        } else {
            Session::flash('error', 'Sell Unit Created Failed!');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = SellUnit::where('su_id',$id)->where('su_status',1)->update([
            'su_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if ($soft) {
            Session::flash('success', 'Sell Unit Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Sell Unit Created Failed!');
            return redirect()->back();
        }
    }

}
