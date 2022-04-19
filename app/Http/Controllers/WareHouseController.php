<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WareHouse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class WareHouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = WareHouse::where('wh_status',1)->orderBy('wh_id','DESC')->get();
        return view('admin.warehouse.index', compact('all'));
    }

    public function create(){
        return view('admin.warehouse.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'wh_name' => ['required', 'string'],
            'wh_phone' => ['required', 'string'],
        ],[
            'wh_name.required' => 'Please enter name',
            'wh_phone.required' => 'Please enter phone number',
        ]);

        $slug = Str::slug($request->wh_name);
        $created = Auth::user()->id;
        $insert = WareHouse::insertGetId([
            'wh_name' => $request['wh_name'],
            'wh_email' => $request['wh_email'],
            'wh_phone' => $request['wh_phone'],
            'wh_address' => $request['wh_address'],
            'wh_slug' => $slug,
            'wh_created' => $created,
            'wh_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'warehouse Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'wh Created Failed!');
            return redirect()->back();
        }

    }

    public function edit($slug){
        $data = WareHouse::where('wh_status',1)->where('wh_slug',$slug)->firstOrFail();
        return view('admin.warehouse.edit', compact('data'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'wh_name' => ['required', 'string'],
            'wh_phone' => ['required', 'string'],
        ],[
            'wh_name.required' => 'Please enter name',
            'wh_phone.required' => 'Please enter phone number',
        ]);
        $id = $request['wh_id'];
        $edited = Auth::user()->id;
        $slug = Str::slug($request->wh_name);
        $update = WareHouse::where('wh_id',$id)->update([
            'wh_name' => $request['wh_name'],
            'wh_email' => $request['wh_email'],
            'wh_phone' => $request['wh_phone'],
            'wh_address' => $request['wh_address'],
            'wh_slug' => $slug,
            'wh_editor' => $edited,
            'wh_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'warehouse Created successfully');
            return redirect( route('warehouse.index'));
        } else {
            Session::flash('error', 'wh Created Failed!');
            return redirect()->back();
        }

    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = WareHouse::where('wh_status',1)->where('wh_id',$id)->update([
            'wh_status' => 0,
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
