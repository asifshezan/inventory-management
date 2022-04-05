<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $all = Supplier::where('supplier_status',1)->orderBy('supplier_id','DESC')->get();
        return view('admin.supplier.index', compact('all'));
    }

    public function create(){
        return view('admin.supplier.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'supplier_name' => ['required', 'string', 'max:255'],
            'supplier_company' => ['required', 'string', 'max:255'],
            'supplier_phone' => ['required', 'string', 'max:20'],
            'supplier_address' => ['required', 'string', 'max:255'],
            'supplier_remarks' => ['required', 'string', 'max:255'],
        ],[

            'supplier_name.required' =>  'Enter  supplier Name',
            'supplier_phone.required' =>  'Enter Phone',
            'supplier_address.required' =>  'Enter Address',
            'supplier_company.required' =>  'Enter Company Name',
            'supplier_remarks.required' =>  'Enter Remarks'
        ]);

        $slug = 'S' . uniqid();
        $creator = Auth::user()->id;
        $insert = Supplier::insertGetId([
            'supplier_name' => $request->supplier_name,
            'supplier_image' => $request->supplier_pic,
            'supplier_email' => $request->supplier_email,
            'supplier_company' => $request->supplier_company,
            'supplier_phone' => $request->supplier_phone,
            'supplier_address' => $request->supplier_address,
            'supplier_city' => $request->supplier_city,
            'supplier_state' => $request->supplier_state,
            'supplier_postal' => $request->supplier_postal,
            'supplier_country' => $request->supplier_country,
            'supplier_remarks' => $request->supplier_remarks,
            'supplier_slug' => $slug,
            'supplier_creator' => $creator,
            'supplier_status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('supplier_pic')){
            $image = $request->file('supplier_pic');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/suppliers/' . $imageName);

            Supplier::where('supplier_id',$insert)->update([
                'supplier_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($insert) {
            Session::flash('success', 'Supplier Created successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Supplier Created Failed!');
            return redirect()->back();
        }
    }

    public function edit($slug){
        $data = Supplier::where('supplier_status',1)->where('supplier_slug',$slug)->firstOrfail();
        return view('admin.supplier.edit', compact('data'));
    }

    public function update(Request $request)
    {   $id = $request['supplier_id'];
        $this->validate($request,[
            'supplier_name' => ['required', 'string', 'max:255'],
            'supplier_company' => ['required', 'string', 'max:255'],
            'supplier_phone' => ['required', 'string', 'max:20'],
            'supplier_address' => ['required', 'string', 'max:255'],
            'supplier_remarks' => ['required', 'string', 'max:255'],
        ],[
            'supplier_name.required' =>  'Enter  Supplier Name',
            'supplier_phone.required' =>  'Enter Phone',
            'supplier_address.required' =>  'Enter Address',
            'supplier_company.required' =>  'Enter Company Name',
            'supplier_remarks.required' =>  'Enter Remarks'
        ]);

        $editor = Auth::user()->id;
        $update = Supplier::where('supplier_id',$id)->update([
            'supplier_name' => $request->supplier_name,
            'supplier_image' => $request->supplier_pic,
            'supplier_email' => $request->supplier_email,
            'supplier_company' => $request->supplier_company,
            'supplier_phone' => $request->supplier_phone,
            'supplier_address' => $request->supplier_address,
            'supplier_city' => $request->supplier_city,
            'supplier_state' => $request->supplier_state,
            'supplier_postal' => $request->supplier_postal,
            'supplier_country' => $request->supplier_country,
            'supplier_remarks' => $request->supplier_remarks,
            'supplier_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('supplier_pic')){
            $image = $request->file('supplier_pic');
            $imageName = $id . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/suppliers/' . $imageName);

            Supplier::where('supplier_id',$id)->update([
                'supplier_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if ($update) {
            Session::flash('success', 'Supplier Updated successfully');
            return redirect( route('supplier.index'));
        } else {
            Session::flash('error', 'Supplier Updated Failed!');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Supplier::where('supplier_status',1)->where('supplier_id',$id)->update([
            'supplier_status' => 0,
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
