<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = Contact::where('cont_status',1)->firstOrFail();
        return view('admin.setting.contact', compact('data'));
    }

    public function update(Request $request){
        $id = $request['cont_id'];
        $update = contact::where('cont_id',$id)->update([
            'cont_phone1' => $request->cont_phone1,
            'cont_phone2' => $request->cont_phone2,
            'cont_email1' => $request->cont_email1,
            'cont_email2' => $request->cont_email2,
            'cont_add1' => $request->cont_add1,
            'cont_add2' => $request->cont_add2,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Contact Info Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Contact Info Updated Failed!');
            return redirect()->back();
        }
    }
}
