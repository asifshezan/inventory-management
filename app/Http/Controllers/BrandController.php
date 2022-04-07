<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all = Brand::where('brand_status',1)->orderBy('brand_id','DESC')->get();
        return view('admin.brand.index', compact('all'));
    }

    public function create(){
        return view('admin.brand.create');
    }

    public function store(BrandRequest $request){
        // $this->validate($request,[
        //     'brand_name' => ['required', 'string', 'max:255'],
        // ],[
        //     'brand_name.required' => 'Please enter brand name',
        // ]);

        $slug = Str::slug($request['brand_name']);
        $creator = Auth::user()->id;
        $insert = Brand::insertGetId([
            'brand_name' => $request['brand_name'],
            'brand_slug' => $slug,
            'brand_creator' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('brand_image')){
            $image = $request->file('brand_image');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/brands/' . $imageName);

            Brand::where('brand_id',$insert)->update([
                'brand_image' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

            if ($insert) {
                Session::flash('success', 'Brand Created successfully');
                return redirect()->back();
            } else {
                Session::flash('error', 'Brand Created Failed!');
                return redirect()->back();
            }
    }

    public function edit($slug){
        $data = Brand::where('brand_status',1)->where('brand_slug',$slug)->firstOrfail();
        return view('admin.brand.edit', compact('data'));
    }

    public function update(BrandRequest $request){
        $id = $request['brand_id'];
        $slug = Str::slug($request['brand_name']);
        $editor = Auth::user()->id;
        $update = Brand::where('brand_id',$id)->update([
            'brand_name' => $request['brand_name'],
            'brand_slug' => $slug,
            'brand_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('brand_image')){
            $image = $request->file('brand_image');
            $imageName = $id . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/brands/' . $imageName);

            Brand::where('brand_id',$id)->update([
                'brand_image' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

            if ($update) {
                Session::flash('success', 'Brand updated successfully');
                return redirect( route('brand.index') );
            } else {
                Session::flash('error', 'Brand updated Failed!');
                return redirect()->back();
            }
    }

    public function softdelete(){
        $id = $_POST['modal_id'];
        $soft = Brand::where('brand_status',1)->where('brand_id',$id)->update([
            'brand_status' => 0,
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
