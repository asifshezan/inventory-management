<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all = User::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.user.all', compact('all'));
    }

    public function add(){
        return view('admin.user.add');
    }

    public function edit($slug){
        $data = User::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.user.edit', compact('data'));
    }

    public function view(){

    }

    public function create(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
        ],[
            'name.required' => "Please enter your name",
            'email.required' => "Please enter your email",
            'phone.required' => "Please enter your phone number",
        ]);

        $slug = 'U' . uniqid();
        $insert = User::insertGetId([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
            'slug' => $slug,
            'active' => $request['active'],
            'status' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $insert . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/users/' . $imageName);

            User::where('id',$insert)->update([
                'photo' => $imageName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($insert){
            Session::flash('success','Successfully Insert User.');
            return redirect()->back();
        }else{
            Session::flash('error','Opps! Failed to Insert.');
            return redirect()->back();
        }
    }

    public function update(Request $request){
        $id = $request['id'];
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
        ],[
            'name.required' => "Please enter your name",
            'phone.required' => "Please enter your phone number",
        ]);


        $update = User::where('id',$id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'role' => $request['role'],
            'active' => $request['active'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('pic')){
            $image = $request->file('pic');
            $imageName = $id . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('uploads/users/' . $imageName);

            User::where('id',$id)->update([
                'photo' => $imageName,
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        if($update){
            Session::flash('success','Successfully update User.');
            return redirect()->back();
        }else{
            Session::flash('error','Opps! Failed to update.');
            return redirect()->back();
        }
    }

}
