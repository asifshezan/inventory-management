<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class BillerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all = Biller::where('biller_status',1)->orderBy('biller_id','DESC')->get();
        return view('admin.biller.index', compact('all'));
    }

    public function create(){
        return view('admin.biller.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'biller_name' => ['required', 'string', 'max:255'],
            'biller_company' => ['required', 'string', 'max:255'],
            'biller_phone' => ['required', 'string', 'max:20'],
            'biller_address' => ['required', 'string', 'max:255'],
            'biller_email' => ['required', 'string', 'max:255'],
        ],[

            'biller_name.required' =>  'Enter  biller Name',
            'biller_phone.required' =>  'Enter Phone',
            'biller_address.required' =>  'Enter Address',
            'biller_company.required' =>  'Enter Company Name',
            'biller_email.required' =>  'Enter Remarks'
        ]);

        $slug = 'Bill'.'-' . uniqid();
        $creator = Auth::user()->id;
        $insert = Biller::insertGetId([
            'biller_name' => $request->biller_name,
            'biller_image' => $request->biller_pic,
            'biller_email' => $request->biller_email,
            'biller_company' => $request->biller_company,
            'biller_phone' => $request->biller_phone,
            'biller_address' => $request->biller_address,
            'biller_city' => $request->biller_city,
            'biller_country' => $request->biller_country,
            'biller_slug' => $slug,
            'biller_creator' => $creator,
            'biller_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('biller_pic')){
            $image = $request->file('biller_pic');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/billers/' . $imageName);

            Biller::where('biller_id',$insert)->update([
                'biller_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($insert) {
            Session::flash('success', 'biller Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'biller Created Failed!');
            return redirect()->back();
        }
    }

    public function edit($slug){
        $data = Biller::where('biller_status',1)->where('biller_slug',$slug)->firstOrfail();
        return view('admin.biller.edit', compact('data'));
    }


    public function update(Request $request)
    {
        $id = $request['biller_id'];
        $this->validate($request,[
            'biller_name' => ['required', 'string', 'max:255'],
            'biller_phone' => ['required', 'string', 'max:20'],
            'biller_company' => ['required', 'string', 'max:255'],
        ],[
            'biller_name.required' =>  'Enter  Customer Name',
            'biller_phone.required' =>  'Enter Phone',
            'biller_company.required' =>  'Enter Company Name',
        ]);
        $editor = Auth::user()->id;
        $update = Biller::where('biller_id',$id)->update([
            'biller_name' => $request->biller_name,
            'biller_image' => $request->biller_pic,
            'biller_email' => $request->biller_email,
            'biller_company' => $request->biller_company,
            'biller_phone' => $request->biller_phone,
            'biller_address' => $request->biller_address,
            'biller_city' => $request->biller_city,
            'biller_state' => $request->biller_state,
            'biller_postal' => $request->biller_postal,
            'biller_country' => $request->biller_country,
            'biller_remarks' => $request->biller_remarks,
            'biller_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('biller_pic')){
            $image = $request->file('biller_pic');
            $imageName = $id . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/billers/' . $imageName);

            biller::where('biller_id',$id)->update([
                'biller_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($update) {
            Session::flash('success', 'biller Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'biller Updated Failed!');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = biller::where('biller_status',1)->where('biller_id',$id)->update([
            'biller_status' => 0,
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
