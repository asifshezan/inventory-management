<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = Social::where('sm_status',1)->firstOrFail();
        return view('admin.setting.Social', compact('data'));
    }

    public function update(Request $request){
        $id = $request['sm_id'];
        $update = Social::where('sm_id',$id)->update([
            'sm_facebook' => $request->sm_facebook,
            'sm_twitter' => $request->sm_twitter,
            'sm_linkedin' => $request->sm_linkedin,
            'sm_dribbble' => $request->sm_dribbble,
            'sm_youtube' => $request->sm_youtube,
            'sm_slack' => $request->sm_slack,
            'sm_instagram' => $request->sm_instagram,
            'sm_behance' => $request->sm_behance,
            'sm_google' => $request->sm_google,
            'sm_raddit' => $request->sm_raddit,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Social Features Updated successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Social Features Updated Failed!');
            return redirect()->back();
        }
    }
}
